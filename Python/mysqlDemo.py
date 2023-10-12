from unicodedata import name
import mysql.connector
mydb=mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="student"
)
class msql:
    name=""
    roll=0
    def __init__(self,name,rollno):
        self.name=name
        self.roll=rollno
    def displayRecords(self):
        mycur=mydb.cursor()
        mycur.execute("select * from student")
        record=mycur.fetchall()
        for x in record:
            print(x);
    def insertRecodspara(self,name1,roll1):
        mycur=mydb.cursor()
        mycur.execute("insert into student values('"+name1+"',"+str(roll1)+")")
        mydb.commit()
    def insertRecods(self):
        mycur=mydb.cursor()
        mycur.execute("insert into student values('"+self.name+"',"+str(self.roll)+")")
        mydb.commit()
    def truncateTable(self):
        mycur=mydb.cursor()
        mycur.execute("truncate table student")
        mydb.commit()
sql=msql("Partham Lal he",140)
sql.insertRecodspara("Parth Lal he",134)
sql.insertRecods()
sql.displayRecords()
sql.truncateTable() 