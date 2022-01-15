#!/usr/bin/python
import io
import sys
import os
import shutil

current_ver = "3.2.13"

os.system("")
if __name__ == "__main__":
    if len (sys.argv) > 1:
        cfg_file = sys.argv[1] + ".cfg"
    else:
        cfg_file = "mebbr.cfg"

class bcolors:
    RED   =  '\033[91m'
    ENDC  =  '\033[0m'
    GREEN =  '\033[92m'
    CYAN  =  '\033[96m'

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

def build_file(fin, dout, fout):
    print("Reading " + bcolors.CYAN + os.getcwd() + fin + bcolors.ENDC)
    try:
        file = io.open(os.getcwd() + fin, mode="r", encoding="utf-8")
        read_data = file.read()
        file.close()
    except:
        print(bcolors.RED + "There's a problem with " + fin + bcolors.ENDC)
        quit()
    try:
        if not os.path.exists(os.getcwd() + dout):
            os.makedirs(os.getcwd() + dout)
        file = io.open(os.getcwd() + fout, mode="w", encoding="utf-8")
        file.write(replace_values(read_data, config))
        file.close()
        print(bcolors.GREEN + "DONE: File " + fout + " was built successful" + bcolors.ENDC)
    except:
        print(bcolors.RED + "There's a problem with saving " + fout + bcolors.ENDC)
        quit()

def copy_file(fin, fout):
    try:
        shutil.copyfile(os.getcwd() + config[fin][0], os.getcwd() + fout)
        print(bcolors.GREEN + "DONE: File " + fout + " was copied successful" + bcolors.ENDC)
    except:
        print(bcolors.RED + "Cannot create " + fout + bcolors.ENDC)
        quit()

print("Reading " + bcolors.CYAN + os.getcwd() + "/" + cfg_file + bcolors.ENDC)
try:
    cfg = io.open(cfg_file, mode="r", encoding="utf-8")
    config = {}
    for line in cfg:
        key, *value = line.split()
        config[key] = value
    cfg.close()
except:
    print(bcolors.RED + 'There is a problem with your config file' + bcolors.ENDC)
    quit()

print(bcolors.GREEN + "Config was parsed" + bcolors.ENDC)
config["{Theme_Version}"] = current_ver.split()
print(bcolors.CYAN + "Cleaning the build directory..." + bcolors.ENDC)
try:
    if os.path.exists(os.getcwd() + "/build"):
        shutil.rmtree(os.getcwd() + "/build")
        print(bcolors.GREEN + "DONE" + bcolors.ENDC)
    else:
        print(bcolors.GREEN + "There is nothing to clean" + bcolors.ENDC)
except:
    print(bcolors.RED + "There's a problem with cleaning build folder" + bcolors.ENDC)
    quit()

build_file("/src/theme/style.css", "/build/theme/", "/build/theme/style.css")
copy_file("{Theme_Icon}","/build/theme/screenshot.png")
copy_file("{Theme_Functions}","/build/theme/functions.php")
copy_file("{Theme_Comments}","/build/theme/comments.php")
copy_file("{Theme_Content_None}","/build/theme/content-none.php")
build_file("/src/theme/index.php", "/build/theme/", "/build/theme/index.php")
build_file("/src/theme/single.php", "/build/theme/", "/build/theme/single.php")
build_file("/src/theme/single.php", "/build/theme/", "/build/theme/page.php")

print(bcolors.GREEN + "THEME " + sanitaze_key("{Theme_Name}", config) + " WAS BUILT SUCESS" + bcolors.ENDC)