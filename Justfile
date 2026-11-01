# Automatically load environment variables from .env
set dotenv-load := true

# Choose python command: prefer python3 if available, otherwise python
python := if which("python3") != "" { "python3" } else { "python" }

# List available commands by default
default:
    @just --list

# Install Node dependencies for Gulp SCSS build
setup:
    npm ci

# Compile SCSS to CSS via Gulp
styles:
    node node_modules/gulp/bin/gulp.js styles

# Build theme locally for a single config (e.g. `just build mebbr --skip` or `just build mebbr.cfg`)
build site="mebbr" bump="--skip":
    #!/usr/bin/env bash
    set -euo pipefail
    cfg="{{site}}"
    if [[ "$cfg" != *.cfg ]]; then
        cfg="${cfg}.cfg"
    fi
    {{python}} ./main.py "$cfg" {{bump}}

# Build and deploy all sites listed in DEPLOY_SITES (bumps version once)
deploy bump="--patch":
    #!/usr/bin/env bash
    set -euo pipefail

    if [ -z "${DEPLOY_SITES:-}" ]; then
        echo "Error: DEPLOY_SITES is not set in .env"
        exit 1
    fi

    FIRST_RUN=1
    for site in $DEPLOY_SITES; do
        target_var="DEPLOY_TARGET_${site}"
        target="${!target_var:-}"

        if [ -z "$target" ]; then
            echo "Error: ${target_var} is not defined in .env"
            exit 1
        fi

        # Only increment version on the first site; use --skip for the rest
        if [ "$FIRST_RUN" -eq 1 ]; then
            current_bump="{{bump}}"
            FIRST_RUN=0
        else
            current_bump="--skip"
        fi

        cfg="${site}"
        if [[ "$cfg" != *.cfg ]]; then
            cfg="${cfg}.cfg"
        fi

        echo "=========================================="
        echo "Building site: ${site} (${current_bump})"
        echo "=========================================="
        {{python}} ./main.py "${cfg}" "${current_bump}"

        echo "Syncing /build/theme/ -> ${target}"
        rsync -avz --delete \
            -e "ssh -i ${SSH_KEY_PATH:-~/.ssh/id_ed25519} -p ${SSH_PORT:-22} -o StrictHostKeyChecking=accept-new" \
            ./build/theme/ "${target}"

        echo "Successfully deployed ${site}"
    done

# Build and deploy a single specific site without bumping version by default
deploy-one site bump="--skip":
    DEPLOY_SITES="{{site}}" just deploy {{bump}}
