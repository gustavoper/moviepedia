####
#### movieSearch.py
#### Busca simples a base de dados (relatorio)
#### e necessario que o arquivo config.ini esteja presente!

import MySQLdb
import ConfigParser



#Parsing config file
ConfigFileParameters = ConfigParser.ConfigParser();
ConfigFileParameters.read("config.ini");

db = MySQLdb.connect(host=ConfigFileParameters.get("db-config","host"),    
	                     user=ConfigFileParameters.get("db-config","user"),         
	                     passwd=ConfigFileParameters.get("db-config","passwd"),  
	                     db=ConfigFileParameters.get("db-config","db"))        

cur = db.cursor()
query = "SELECT mv.id,mv.name,gr.name,pl.name, year(mv.launchYear) FROM movie mv inner join publisher pl on pl.id = mv.id inner join genre gr on gr.id = mv.id"
cur.execute(query) 
print "{} | {} | {} | {} | {} ".format("#","Nome","Genero","Produtora","Ano")
for row in cur.fetchall():
		print "{} | {} | {} | {} | {} ".format(row[0],row[1],row[2],row[3],row[4])
db.close()
