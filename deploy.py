#!/usr/bin/env python
import os
import sys
import subprocess
import shlex

def main():
    # Determine bump argument
    bump = sys.argv[1] if len(sys.argv) > 1 else '--patch'
    deploy_sites_env = os.environ.get('DEPLOY_SITES', '').strip()
    if not deploy_sites_env:
        print('Error: DEPLOY_SITES is not set in .env', file=sys.stderr)
        sys.exit(1)

    sites = deploy_sites_env.split()
    ssh_key = os.environ.get('SSH_KEY_PATH', os.path.expanduser('~/.ssh/id_ed25519'))
    ssh_port = os.environ.get('SSH_PORT', '22')

    first_run = True
    for site in sites:
        target_var = f'DEPLOY_TARGET_{site}'
        target = os.environ.get(target_var, '').strip()
        if not target:
            print(f'Error: {target_var} is not defined in .env', file=sys.stderr)
            sys.exit(1)

        current_bump = bump if first_run else '--skip'
        first_run = False

        cfg = site if site.endswith('.cfg') else f'{site}.cfg'
        print('==========================================')
        print(f'Building site: {site} ({current_bump})')
        print('==========================================')
        
        build_cmd = [sys.executable, 'main.py', cfg, current_bump]
        res = subprocess.run(build_cmd)
        if res.returncode != 0:
            print(f'Build failed for {site}', file=sys.stderr)
            sys.exit(res.returncode)

        print(f'Syncing ./build/theme/ -> {target}')
        ssh_cmd = f'ssh -i "{ssh_key}" -p {ssh_port} -o StrictHostKeyChecking=accept-new'
        rsync_cmd = ['rsync', '-avz', '--delete', '-e', ssh_cmd, './build/theme/', target]
        res_sync = subprocess.run(rsync_cmd)
        if res_sync.returncode != 0:
            print(f'Sync failed for {site}', file=sys.stderr)
            sys.exit(res_sync.returncode)

        print(f'Successfully deployed {site}')

if __name__ == '__main__':
    main()
