#coding=utf8
import networkscan
import os


adbShell = "adb shell  {cmdStr}"
os.chdir="adbroot"

def execute(cmd):
    str = adbShell.format(cmdStr=cmd)
    print(str)
    os.system(str)


if __name__ == '__main__':
    defif=[
'10.200.1.100',
        '10.200.1.1','10.200.1.201','10.200.1.2',
        '10.200.1.41','10.200.1.35','10.200.1.44',
        '10.200.1.27','10.200.1.36','10.200.1.221',
        '10.200.1.200','10.200.1.100','10.200.1.100','10.200.1.100','10.200.1.100',
    '10.200.1.100','10.200.1.100','10.200.1.100','10.200.1.100','10.200.1.100',]
    # Define the network to scan
    my_network = "10.200.1.0/24"

    # Create the object
    my_scan = networkscan.Networkscan(my_network)

    # Run the scan of hosts using pings
    my_scan.run()

    # Display the IP address of all the hosts found
    for i in my_scan.list_of_hosts_found:
        if i in defif:
            pass
        else:
            print(i)
