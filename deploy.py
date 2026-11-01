#!/usr/bin/env python
import os
import sys
import subprocess
import shutil

def sync_files(build_dir, target, ssh_key, ssh_port):
    rsync_bin = shutil.which('rsync')
    if rsync_bin:
        ssh_cmd = f'ssh -i "{ssh_key}" -p {ssh_port} -o StrictHostKeyChecking=accept-new'
        cmd = [rsync_bin, '-avz', '--delete', '-e', ssh_cmd, f'{build_dir}/', target]
        res = subprocess.run(cmd)
        return res.returncode == 0

    scp_bin = shutil.which('scp')
    if scp_bin:
        print('[deploy] rsync not found on Windows; falling back to native scp -r')
        cmd = [scp_bin, '-P', str(ssh_port), '-i', ssh_key, '-o', 'StrictHostKeyChecking=accept-new', '-r']
        for item in os.listdir(build_dir):
            cmd.append(os.path.join(build_dir, item))
        cmd.append(target)
        res = subprocess.run(cmd)
        return res.returncode == 0

    print('Error: neither rsync nor scp was found on the system.', file=sys.stderr)
    return False

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
        if not sync_files('./build/theme', target, ssh_key, ssh_port):
            print(f'Sync failed for {site}', file=sys.stderr)
            sys.exit(1)

        print(f'Successfully deployed {site}')

if __name__ == '__main__':
    main()
