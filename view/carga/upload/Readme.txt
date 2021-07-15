0. Mount iso-file MatlabR2019a_win64.iso to virtual drive. For that purpose you can use Daemon Tools or similar soft.
1. Run setup.exe from that virtual drive and use option "Use a File Installation Key".
2. When you will be asked to "Provide File Installation Key" select "I have the File Installation Key for my license" and enter
     09806-07443-53955-64350-21751-41297
3. Select folder where you want Matlab to be installed. When you will be asked to "Select products to install" deselect component "Matlab Parallel Server" and select
     components you need. If you will leave all components selected matlab will need 23Gb of disk size and longer startup time. If you left only "Matlab 9.6" - 2.5Gb of disk size.
     You better setup Matlab on SSD disk for better startup time, so you probably need to not waste SSD-disk size for nothing.
4. After installation is done copy file "netapi32.dll" to already existing "<matlabfolder>\bin\win64" folder (<matlabfolder> - is where you have installed Matlab).
5. Copy "license.lic" file to <matlabfolder>\licenses folder.
     Alternatively to copying license file manually you can just start Matlab.
     In that case you will got window asking you to select license
        First select "Activate manually without the Internet" and
        then in field "Enter the full path to your license file, including the file name" select "license.lic" file
6. Work with Matlab :)


P.S.
license.lic additionally to possibilities of license_standalone.lic gives Matlab permission to work from remote desktop (RDP)
  This allow not to use license_server.lic in certain cases

P.S.2
File Installation Key you give to installer actually depend on Matlab edition and type of license you want
  For standalone license (license.lic or license_standalone.lic):
    For workstation use case (typical configuration) : 09806-07443-53955-64350-21751-41297
    For cluster node "Matlab Parallel Server"        : 40236-45817-26714-51426-39281
  For floating license (license_server.lic)
    For workstation use case (typical configuration) : 31095-30030-55416-47440-21946-54205
    For cluster node "Matlab Parallel Server"        : 57726-51709-20682-42954-31195

======================
www.ShareAppsCrack.com