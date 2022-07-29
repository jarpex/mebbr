#!/usr/bin/python
from sys import argv
from re import match as regmatch
from os import path, getcwd, makedirs, system
from shutil import rmtree, copyfile

class bcolors:
    RED   =  '\033[91m'
    GREEN =  '\033[92m'
    CYAN  =  '\033[96m'
    ENDC  =  '\033[0m'

def help():
    print("\nA monolithic, highly optimized, debloated (a part) WordPress theme written from scratch specifically for Asya’s sites.\n")
    print("###########################")
    print(f"{bcolors.CYAN}Configuration{bcolors.ENDC}")
    print("###########################\n")
    print(f"Create a configuration file for your website like {bcolors.CYAN}«/config/example.cfg»{bcolors.ENDC}. Configuration files should be placed at {bcolors.CYAN}«/config/»{bcolors.ENDC} directory. Each parameter should be placed for one line. To create a newline in your configuration file you should use a {bcolors.GREEN}&newline&{bcolors.ENDC} command. There is also available a {bcolors.GREEN}&tab&{bcolors.ENDC} command for better code legibility.\n")
    print("###########################")
    print(f"{bcolors.CYAN}Build{bcolors.ENDC}")
    print("###########################\n")
    print("To build the project, use the command:")
    print(f"{bcolors.GREEN}python3{bcolors.ENDC} {bcolors.CYAN}./main.py{bcolors.ENDC} {bcolors.RED}arguments{bcolors.ENDC}\n")
    print("Available arguments:")
    print(f"{bcolors.RED}config.cfg{bcolors.ENDC} — specify your configuration file")
    print(f"{bcolors.RED}config{bcolors.ENDC} — alternate version to specify configuration file")
    print(f"{bcolors.RED}--skip{bcolors.ENDC} — do not upgrade theme version")
    print(f"{bcolors.RED}--patch{bcolors.ENDC} — increment a patch version")
    print(f"{bcolors.RED}--minor{bcolors.ENDC} — increment a minor version")
    print(f"{bcolors.RED}--major{bcolors.ENDC} — increment a major version")
    print(f"{bcolors.RED}--help{bcolors.ENDC} — show a help\n")
    print(f"If no launch arguments are specified for the application, the theme will be built for the site {bcolors.CYAN}https://mebbr.ru/{bcolors.ENDC}")
    print(f"If the build is successful, you will get theme files in the {bcolors.CYAN}/build/{bcolors.ENDC} directory.")
    print(f"Also, you should manually place static files from {bcolors.CYAN}/src/css/{bcolors.ENDC} and {bcolors.CYAN}/src/js/{bcolors.ENDC} into you CDN.")
    quit()

def version():
    ver_line = ""
    print("Reading " + bcolors.CYAN + "version" + bcolors.ENDC)
    try:
        with open("version", mode="r", encoding="utf-8") as ver:
            ver_line = ver.readline()
    except:
        print(bcolors.RED + 'There is a problem with your version file' + bcolors.ENDC)
        quit()
    current_ver = ver_line.split('.')
    match ver_upd:
        case 0:
            print("Patch")
            current_ver[2] = int(current_ver[2]) + 1
        case 1:
            print("Minor")
            current_ver[1] = int(current_ver[1]) + 1
            current_ver[2] = 0
        case 2:
            print("Major")
            current_ver[0] = int(current_ver[0]) + 1
            current_ver[1] = 0
            current_ver[2] = 0
        case 3:
            print("Skip")
    print(f"Build version: {bcolors.GREEN}{str(current_ver[0])}.{str(current_ver[1])}.{str(current_ver[2])}{bcolors.ENDC}")
    return current_ver

def configuration():
    config = {}
    try:
        with open(cfg_file, mode="r", encoding="utf-8") as cfg:
            for line in cfg:
                key, *value = line.split()
                config[key] = value
    except:
        print(f"{bcolors.RED}There is a problem with your config file \"{cfg_file}\"{bcolors.ENDC}")
        quit()
    print(f"{bcolors.GREEN}Config was parsed{bcolors.ENDC}")
    return config

def cleaning():
    print(f"{bcolors.CYAN}Cleaning the build directory...{bcolors.ENDC}")
    build_path = (getcwd() + "/build")
    try:
        if path.exists(build_path):
            rmtree(build_path)
            print(f"{bcolors.GREEN}DONE{bcolors.ENDC}")
        else:
            print(f"{bcolors.GREEN}There is nothing to clean{bcolors.ENDC}")
    except:
        print(f"{bcolors.RED}There's a problem with cleaning build folder{bcolors.ENDC}")
        quit() 

def sanitaze_key(key, args_dict):
    val = ""
    for i in range(len(args_dict[key])):
        if i != 0:
            val = val + " " + str(args_dict[key][i])
        else:
            val = str(args_dict[key][i])
    return val

def replace_values(text, args_dict):
    for key in args_dict.keys():        
        text = text.replace(key, sanitaze_key(key, args_dict))
    text = text.replace("&newline&", "\n" )
    text = text.replace("&tab&", "\t" )
    return text

def build_file(fin, dout, fout, config):
    print(f"Reading {bcolors.CYAN}{getcwd()}{fin}{bcolors.ENDC}")
    try:
        with open(getcwd() + fin, mode="r", encoding="utf-8") as f:
            read_data = f.read()
    except:
        print(f"{bcolors.RED}There's a problem with {fin}{bcolors.ENDC}")
        quit()
    try:
        path_dout = (getcwd() + dout)
        if not path.exists(path_dout):
            makedirs(path_dout)
        with open(getcwd() + fout, mode="w", encoding="utf-8") as f:
            f.write(replace_values(read_data, config))
        print(f"{bcolors.GREEN}DONE: File {fout} was built successful{bcolors.ENDC}")
    except:
        print(f"{bcolors.RED}There's a problem with saving {fout}{bcolors.ENDC}")
        quit()

def copy_file(fin, fout, config):
    try:
        copyfile(getcwd() + config[fin][0], getcwd() + fout)
        print(f"{bcolors.GREEN}DONE: File {fout} was copied successful{bcolors.ENDC}")
    except:
        print(f"{bcolors.RED}Cannot create {fout}{bcolors.ENDC}")
        quit()

def updating_ver(config):
    if ver_upd < 3:
        match ver_upd:
            case 0:
                print(f"Updating {bcolors.CYAN}patch version{bcolors.ENDC}")
            case 1:
                print(f"Updating {bcolors.CYAN}minor version{bcolors.ENDC}")
            case 2:
                print(f"Updating {bcolors.CYAN}major version{bcolors.ENDC}")
    try:
        with open("version", mode="w", encoding="utf-8") as ver:
            ver.write(str(config["{Theme_Version}"][0]))
    except:
        print(f"{bcolors.RED}Failed to update your version file{bcolors.ENDC}")
        quit()

def main(ver_upd, cfg_file):
    current_ver = version()
    config = configuration()
    config["{Theme_Version}"] = [(f"{current_ver[0]}.{current_ver[1]}.{current_ver[2]}")]
    cleaning()
    ####################BUILDING######################
    system("gulp styles")
    build_file("/src/theme/style.css", "/build/theme/", "/build/theme/style.css", config)
    copy_file("{Theme_Icon}","/build/theme/screenshot.png", config)
    copy_file("{Theme_Functions}","/build/theme/functions.php", config)
    copy_file("{Theme_Comments}","/build/theme/comments.php", config)
    copy_file("{Theme_Content_None}","/build/theme/content-none.php", config)
    build_file("/src/theme/index.php", "/build/theme/", "/build/theme/index.php", config)
    build_file("/src/theme/single.php", "/build/theme/", "/build/theme/single.php", config)
    build_file("/src/theme/single.php", "/build/theme/", "/build/theme/page.php", config)
    #################################################
    updating_ver(config)
    print(f"{bcolors.GREEN}THEME {sanitaze_key('{Theme_Name}', config)} WAS BUILT SUCESS{bcolors.ENDC}")
    print('\a')

if __name__ == "__main__":
    argsize = len (argv)
    cfg_file = "config/mebbr.cfg"
    # ----------------------------------------------------
    # ver_upd defines auto-update of the theme version. 
    # 0 - default value, means updating the patch version. 
    # 1 - minor version update.
    # 2 - update of the major version.
    # 3 - do not update the version.
    # ----------------------------------------------------
    ver_upd = 0
    if argsize > 1:
        for i in range(argsize - 1):
            x = argv[i + 1]
            if (regmatch("-{2}[a-zA-Z]+", x)):
                match x:
                    case "--help":
                        help()
                    case "--patch":
                        ver_upd = 0
                    case "--minor":
                        ver_upd = 1
                    case "--major":
                        ver_upd = 2
                    case "--skip":
                        ver_upd = 3

            elif (regmatch("^[a-z.]+.cfg", x)):
                cfg_file = f"config/{x}"
            else:
                cfg_file = f"config/{x}.cfg"
    del argsize
    if cfg_file == "":
        print(f"{bcolors.RED}Configuration file not defined{bcolors.ENDC}")
        quit()
    main(ver_upd, cfg_file)