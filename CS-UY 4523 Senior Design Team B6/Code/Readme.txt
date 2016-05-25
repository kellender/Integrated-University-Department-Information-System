How to mount server
1) install psotgresql
2) add schema to psotgresql
3) add insert statements to psotgresql
4) install libpqxx 
5) start postgres: sudo service psotgresql start
6) start apache2: sudo service apache2 start
7) run C++ server using command: g++ CppSrvr.cpp -lpqxx
8) connect with localhost or an IP address [must be done on local network!] 