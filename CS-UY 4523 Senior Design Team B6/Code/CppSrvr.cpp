//Whole Server [C++] was written by Ajay Shenoy
//embedded PHP to comunicate with server was written by Ajay Shenoy
//Database Schema was written by Ajay Shenoy except for aid table which was written by Kevin Ramdass


// This server is a stateless server, though it may seem like it has states with 0,1,2 string return, but it does not remember the user so there for it is stateless
// This server is also not multithreaded because i did want to do it :)
// This server also does not utlize locks in C++ because it is not multithreaded.......... maybe next time

#include <fstream>
#include <vector>

#include <sstream>
#include <stdio.h>       // perror, snprintf
#include <stdlib.h>      // exit
#include <unistd.h>      // close, write
#include <string.h>      // strlen
#include <strings.h>     // bzero

#include <sys/socket.h>  // socket, AF_INET, SOCK_STREAM,
                         // bind, listen, accept
#include <netinet/in.h>  // servaddr, INADDR_ANY, htons
#include <pqxx/pqxx> 	 //connect to the postgress db

using namespace std;
using namespace pqxx;

#define	MAXLINE		4096	// max text line length
#define	BUFFSIZE	8192    // buffer size for reads and writes
#define  SA struct sockaddr
#define	LISTENQ		1024	// 2nd argument to listen()
#define PORT_NUM        13002


string courses(string username, string semester, string year){
   string sql;
   string res = "";
   try{
      connection C("dbname=university user=ajay password=ajay \
      hostaddr=127.0.0.1 port=5432");
      if (C.is_open()) {
      		fprintf(stderr,"opened DB\n");
      } 
			else {
          fprintf(stderr,"cant open DB\n");
         return "1";
      }
      sql="select course.course_id, course.course_name from course left join takes on takes.course_id=course.course_id where id='"+username+"' and semester='"+semester+"' and year='" + year + "';";
      nontransaction N(C);
      result R( N.exec( sql ));
      for (result::const_iterator c = R.begin(); c != R.end(); ++c) {
					res += c[0].as<string>();
					res += ":";
					res += c[1].as<string>();
					res += "\n";
      }
      fprintf(stderr,"operation success\n");
      C.disconnect ();
			if(res == ""){
				return "0";			
			}
			return res;
   }catch (const std::exception &e){
      fprintf(stderr,"error\n");
      return "1";
   }
   return "0";
}


string transcript(string username, string semester, string year){
   string sql;
   string res = "";
   try{
      connection C("dbname=university user=ajay password=ajay \
      hostaddr=127.0.0.1 port=5432");
      if (C.is_open()) {
      		fprintf(stderr,"opened DB\n");
      } 
			else {
          fprintf(stderr,"cant open DB\n");
         return "1";
      }
      sql="select course.course_id, course.course_name, takes.grade from course left join takes on takes.course_id=course.course_id where id='"+username+"' and semester='"+semester+"' and year='" + year + "';";
      nontransaction N(C);
      result R( N.exec( sql ));
      for (result::const_iterator c = R.begin(); c != R.end(); ++c) {
					res += c[0].as<string>();
					res += ":";
					res += c[1].as<string>();
					res += ":";
					res += c[2].as<string>();
					res += "\n";
      }
      fprintf(stderr,"operation success\n");
      C.disconnect ();
			if(res == ""){
				return "0";			
			}
			return res;
   }catch (const std::exception &e){
      fprintf(stderr,"error\n");
      return "1";
   }
   return "0";
}


string finances(string username){
   string sql;
   string res = "";
   try{
      connection C("dbname=university user=ajay password=ajay \
      hostaddr=127.0.0.1 port=5432");
      if (C.is_open()) {
      		fprintf(stderr,"opened DB\n");
      } 
			else {
          fprintf(stderr,"cant open DB\n");
         return "1";
      }
			fprintf(stderr,"errasoidgfjasjpdfhbsakjdfh");
      sql="select uni_grant, tap, perkins, parent from aid where s_id ='"+username+"';";
      nontransaction N(C);
      result R( N.exec( sql ));
			fprintf(stderr,"errasoidgfjasjpdfhbsakjdfh");
      for (result::const_iterator c = R.begin(); c != R.end(); ++c) {
					res += "School of Engineering Grant";
					res += ":";
					res += c[0].as<string>();
					res += "\n";
					res += "Tap";
					res += ":";
					res += c[1].as<string>();
					res += "\n";
					res += "Perkins";
					res += ":";
					res += c[2].as<string>();
					res += "\n";
					res += "Parent Loan";
					res += ":";
					res += c[3].as<string>();
					res += "\n";
      }
      fprintf(stderr,"operation success\n");
      C.disconnect ();
			if(res == ""){
				return "0";			
			}
			return res;
   }catch (const std::exception &e){
      fprintf(stderr,"error\n");
      return "1";
   }
   return "0";
}

string porfessorLogin(string username, string password){
   string sql;
   
   try{
      connection C("dbname=university user=ajay password=ajay \
      hostaddr=127.0.0.1 port=5432");
      if (C.is_open()) {
      		fprintf(stderr,"opened DB\n");
      } 
			else {
          fprintf(stderr,"cant open DB\n");
         return "1";
      }
      sql = "select user1_id, passwd from user1 right join professor on professor.ID=user1.user1_id where user1_id='" + username + "' and passwd='" + password + "'";
      nontransaction N(C);
      result R( N.exec( sql ));
      for (result::const_iterator c = R.begin(); c != R.end(); ++c) {
				if(c[0].as<string>() == username && c[1].as<string>() == password){
					return"Professor";
				}
      }
      fprintf(stderr,"operation success\n");
      C.disconnect ();
   }catch (const std::exception &e){
      fprintf(stderr,"error");
      return "1";
   }

   return "0";
}



string officialLogin(string username, string password){
   string sql;
   
   try{
      connection C("dbname=university user=ajay password=ajay \
      hostaddr=127.0.0.1 port=5432");
      if (C.is_open()) {
      		fprintf(stderr,"opened DB\n");
      } 
			else {
          fprintf(stderr,"cant open DB\n");
         return "1";
      }
      /* Create SQL statement */
      sql = "select user1_id, passwd from user1 right join official on official.ID=user1.user1_id where user1_id='" + username + "' and passwd='" + password + "'";

      /* Create a non-transactional object. */
      nontransaction N(C);
      
      /* Execute SQL query */
      result R( N.exec( sql ));
      
      /* List down all the records */
      for (result::const_iterator c = R.begin(); c != R.end(); ++c) {
				if(c[0].as<string>() == username && c[1].as<string>() == password){
					return"official";
				}
      }
      fprintf(stderr,"operation success\n");
      C.disconnect ();
   }catch (const std::exception &e){
      fprintf(stderr,"error\n");
      return "1";
   }

   return "0";
}

string adminLogin(string username, string password){
   string sql;
   
   try{
      connection C("dbname=university user=ajay password=ajay \
      hostaddr=127.0.0.1 port=5432");
      if (C.is_open()) {
      		fprintf(stderr,"opened DB\n");
      } 
			else {
          fprintf(stderr,"cant open DB\n");
         return "1";
      }
      /* Create SQL statement */
      sql = "select user1_id, passwd from user1 right join administrator on administrator.ID=user1.user1_id where user1_id='" + username + "' and passwd='" + password + "'";

      /* Create a non-transactional object. */
      nontransaction N(C);
      
      /* Execute SQL query */
      result R( N.exec( sql ));
      
      /* List down all the records */
      for (result::const_iterator c = R.begin(); c != R.end(); ++c) {
				if(c[0].as<string>() == username && c[1].as<string>() == password){
					return"admin";
				}
      }
      fprintf(stderr,"operation success\n");
      C.disconnect ();
   }catch (const std::exception &e){
      fprintf(stderr,"error\n");
      return "1";
   }

   return "0";
}

string studentLogin(string username, string password){
   string sql;
   
   try{
      connection C("dbname=university user=ajay password=ajay \
      hostaddr=127.0.0.1 port=5432");
      if (C.is_open()) {
      		fprintf(stderr,"opened DB\n");
      } 
			else {
          fprintf(stderr,"cant open DB\n");
         return "1";
      }
      /* Create SQL statement */
      sql = "select user1_id, passwd from user1 right join student on student.ID=user1.user1_id where user1_id='" + username + "' and passwd='" + password + "'";

      /* Create a non-transactional object. */
      nontransaction N(C);
      
      /* Execute SQL query */
      result R( N.exec( sql ));
      
      /* List down all the records */
      for (result::const_iterator c = R.begin(); c != R.end(); ++c) {
				if(c[0].as<string>() == username && c[1].as<string>() == password){
					return"student";
				}
      }
      fprintf(stderr,"operation success\n");
      C.disconnect ();
   }catch (const std::exception &e){
      fprintf(stderr,"error\n");
      return "1";
   }

   return "0"; //is for no record
}


string checkLogin(string& credientials){
	istringstream iss(credientials);
	string trash, username, password;
	iss >> trash >> username >> password;
	string result;
  try{
		fprintf(stderr,"run student\n");
		result = studentLogin(username, password);
		fprintf(stderr,"run student\n");
		if(result != "0" and result != "1"){
			return result;
		}
	}catch(const std::exception &e){alex.tan@nyu.edu
			fprintf(stderr,"function error\n");
	}
	fprintf(stderr,"run professor\n");
	result = porfessorLogin(username, password);
	fprintf(stderr,"run professor\n");
	if(result != "0" and result != "1"){
		return result;
	}
	fprintf(stderr,"run official\n");
	result = officialLogin(username, password);
	fprintf(stderr,"run official\n");
	if(result != "0" and result != "1"){
		return result;
	}
	fprintf(stderr,"run admin\n");
	result = adminLogin(username, password);
	fprintf(stderr,"run admin\n");
	if(result != "0" and result != "1"){
		return result;
	}
	return "1"; //1 is for failure

}

string profClass(string username, string semester, string year){
   string sql;
   string res = "";
   try{
      connection C("dbname=university user=ajay password=ajay \
      hostaddr=127.0.0.1 port=5432");
      if (C.is_open()) {
      		fprintf(stderr,"opened DB\n");
      } 
			else {
          fprintf(stderr,"cant open DB\n");
         return "1";
      }
      sql="select distinct student.name, takes.course_id, takes.sec_id from student left join takes on takes.ID=student.ID where (course_id) in (select course_id from teaches where ID= '"+username+"' and year ='"+ year + "' and semester= '"+semester+ "') order by takes.course_id;";
      nontransaction N(C);
      result R( N.exec( sql ));
      for (result::const_iterator c = R.begin(); c != R.end(); ++c) {
					res += c[0].as<string>();
					res += ":";
					res += c[1].as<string>();
					res += ":";
					res += c[2].as<string>();
					res += "\n";
      }
      fprintf(stderr,"operation success\n");
      C.disconnect ();
			if(res == ""){
				return "0";			
			}
			return res;
   }catch (const std::exception &e){
      fprintf(stderr,"error\n");
      return "1";
   }
   return "0";
}

string combinestring(string information){
	istringstream iss(information);
	string state;
	iss >> state;
	if(state == "Cred"){
		return checkLogin(information);	//did not feel like passing a stringstream
	}
	else if(state == "Reg"){
		string username, password;
		iss >> username >> password;
		string result = studentLogin(username, password);
		if(result != "0" or result != "1"){
			string semester, year;
			iss >> semester >> year;
			return courses(username, semester, year);		
		}
	}
	else if(state == "Trans"){alex.tan@nyu.edu
		string username, password;
		iss >> username >> password;
		string result = studentLogin(username, password);
		if(result != "0" and result != "1"){
			string semester, year;
			iss >> semester >> year;
			return transcript(username, semester, year);		
		}	
	}
	else if(state == "Finan"){
		string username, password;
		iss >> username >> password;
		string result = studentLogin(username, password);
		if(result != "0" and result != "1"){
			return finances(username);		
		}	
	}
	else if(state == "profClass"){
		string username, password;
		iss >> username >> password;
		string result = porfessorLogin(username, password);
		if(result != "0" and result != "1"){
			string semester, year;
			iss >> semester >> year;
			return profClass(username, semester, year);		
		}	
	}



	return "2";
	

}

int main(int argc, char **argv) {
    int	listenfd, connfd;
    struct sockaddr_in	servaddr, cli_addr;
    char buff[MAXLINE];
    time_t ticks;

    

    if ((listenfd = socket(AF_INET, SOCK_STREAM, 0)) == -1) {
        perror("Unable to create a socket");
        exit(1);
    }



    memset(&servaddr, 0, sizeof(servaddr));
    servaddr.sin_family = AF_INET;

    servaddr.sin_addr.s_addr = htonl(INADDR_ANY);
    servaddr.sin_port = htons(PORT_NUM);

alex.tan@nyu.edu
    if (bind(listenfd, (SA *) &servaddr, sizeof(servaddr)) == -1) {
        perror("Unable to bind port");
        exit(2);
    }

    if (listen(listenfd, LISTENQ) == -1) {
        perror("Unable to listen");
        exit(3);
    }

    for ( ; ; ) {
	

	fprintf(stderr, "Ready to connect.\n");
        if ((connfd = accept(listenfd, (SA *) NULL, NULL)) == -1) {
            perror("accept failed");
            exit(4);
	}
	fprintf(stderr, "Connected\n");
	//char msg[] = "i still thin that this is a complete wate of time";
	//write works!!!!!!
	//int len = write(connfd, msg, strlen(msg));
	

	//read
	bzero(buff,strlen(buff));	
	read(connfd,buff,255);
	fprintf(stderr,"%s\n",buff);
	string meh = combinestring(buff);
	char sigh[BUFFSIZE] = {};
	for(int i(0); i < meh.size(); ++i){
		sigh[i] = meh[i];  //i know could be problmatic, also theres a ton of bad variables all over the place ha
	}
	fprintf(stderr,"%s\n",sigh);
	if(sigh[0] != 2){
		write(connfd, sigh, strlen(sigh));
	}

        close(connfd);
    }
}
