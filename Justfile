# Automatically load environment variables from .env
set dotenv-load := true

# Windows shell fallback for CMD / PowerShell
set windows-shell := ["cmd.exe", "/c"]

# List available commands by default
default:
    @just --list

# Install Node dependencies for Gulp SCSS build
setup:
    npm ci

# Compile SCSS to CSS via Gulp
styles:
    npx gulp styles

# Build theme locally for a single config (e.g. `just build mebbr --skip` or `just build mebbr.cfg`)
build site="mebbr" bump="--skip":
    python -c "import sys, os, subprocess; cfg = sys.argv[1] if sys.argv[1].endswith('.cfg') else sys.argv[1] + '.cfg'; subprocess.run([sys.executable, 'main.py', cfg, sys.argv[2]], check=True)" {{site}} {{bump}}

# Build and deploy all sites listed in DEPLOY_SITES (bumps version once)
deploy bump="--patch":
    python deploy.py {{bump}}

# Build and deploy a single specific site without bumping version by default
deploy-one site bump="--skip":
    python -c "import os, subprocess; env = dict(os.environ, DEPLOY_SITES='{{site}}'); subprocess.run(['python', 'deploy.py', '{{bump}}'], env=env, check=True)"

