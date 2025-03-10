import mysql.connector
import csv
import random
                           #connection
mydb=mysql.connector.connect(
	host="localhost",
	user="root",
	passwd=""
	)

                           #cursor
mycur=mydb.cursor()



mycur.execute("use data")

#********************************************************************************************************************************************************************

def ofile():
    global file
    global data_list
    try:
        file=input("enter file name\n------------------------------\n")
        fr=open("{0}.csv".format(file),"r")
        data_list=fr.readlines()
        for i in range(len(data_list)):
            data_list[i]=data_list[i].split(",")
    except:
        print("File Not Found\n\n")
        ofile()
        
    


def ranid(li):
    for j in range(0,len(li)+1):
        i=random.randint(500,1999)
        if i in li:
            pass
        else:
            li.append(i)
            return str(i)  

        
        

#********************************************************************************************************************************************************************

def CorrectFile():
    l=[]
    l2=[]
    s=input("Are you sure? All Data will be lost.\nEnter yes or no.\n-------------------------------------\n")
    s=s.upper()
    if s=='YES':
        csv_filer = open("{0}.csv".format(file),"r",newline='')
        csv_reader=csv.reader(csv_filer)
        for row in csv_reader:
            if row[0]=='SCHOOL_ID':
                return
            l2.append(row)
        csv_filer.close()
        csv_filew = open("{0}.csv".format(file),"w",newline='')
        csv_write=csv.writer(csv_filew)
        line_count=0
        for row in l2:
             l3=[]
             for r in row:
                 if line_count==0:
                    l3.append(r.lower())
                 else:
                    l3.append(r) 
             if line_count==0:
                    csv_write.writerow(['School_id'.lower()]+l3)
                    csv_filew.flush()
                    line_count+=1
                 
             else:
                 if '' in row:
                    pass
                 else:
                    csv_write.writerow([ranid(l)]+l3)
                    csv_filew.flush()
        csv_filew.close()            
    elif s=='NO':
        main()
    else:
        print('Invalid Input Re-Enter\n---------------------\n')
            
        
    
#********************************************************************************************************************************************************************        


def insert():
        csv_file = open("{0}.csv".format(file),"r",newline='')
        csv_reader=csv.reader(csv_file,delimiter=',')
        line_count=0
        for row in csv_reader:
            if line_count==0:
                line_count+=1
            else:
                if file.find('tim')!=-1:
                    mycur.execute('''insert into time values("{0}","{1}","{2}","{3}","{4}")'''.format(row[0].replace('"',"'"),row[1].replace('"',"'").lower(),row[2].replace('"',"'").lower(),row[3].replace('"',"'").lower(),row[4].replace('"',"'").lower()))
                elif file.find('inf')!=-1:
                    mycur.execute('''insert into infra values("{0}","{1}","{2}","{3}","{4}","{5}")'''.format(row[0].replace('"',"'"),row[1].replace('"',"'").lower(),row[2].replace('"',"'").lower(),row[3].replace('"',"'").lower(),row[4].replace('"',"'").lower(),row[5].replace('"',"'")))
                elif file.find('fee')!=-1:
                    mycur.execute('''insert into fee values("{0}","{1}","{2}","{3}","{4}","{5}","{6}")'''.format(row[0].replace('"',"'"),row[1].replace('"',"'").lower(),row[2],row[3],row[4],row[5],row[6].replace('"',"'")))
                else:
                    #print('''insert into {g} values("{a}","{b}","{c}","{d}","{e}","{f}")'''.format(a=row[0].replace('"',"'"),b=row[1].replace('"',"'"),c=row[2].replace('"',"'"),d=row[3].replace('"',"'"),e=row[4].replace('"',"'"),f=row[5].replace('"',"'"),g=file.replace('_scrap','')))
                    mycur.execute('''insert into schools values("{a}","{b}","{c}","{d}","{e}","{f}","{g}")'''.format(a=row[0].replace('"',"'"),b=row[1].replace('"',"'").lower(),c=row[2].replace('"',"'").lower(),d=row[3].replace('"',"'").lower(),e=row[4].replace('"',"'"),f=row[5],g=row[6].replace('"',"'").lower()))
                mydb.commit()
        csv_file.close()        

                
#*********************************************************************************************************************************************************************
def printall():
    if find.find('tim')!=-1:
        mycur.execute("select * from time")
    elif file.find('fee')!=-1:
        mycur.execute("select * from fee")
    elif file.find('inf')!=-1:
        mycur.execute("select * from infra")
    else:
        mycur.execute("select * from schools") 
    for i in mycur.fetchall():
        print(i)
    print("------------------------------------------------------------------")
    main()

#*********************************************************************************************************************************************************************   


def Deleteall():
    s=input("Are you sure you want to Delete all Data from {0} Database?\nType 'yes' or 'no'\n---------------------------------\n".format(file.replace('_scrap','')))
    s=s.capitalize()
    if s=='Yes':
        if file.find('tim')!=-1:
            mycur.execute("delete from time")
        elif file.find('fee')!=-1:
            mycur.execute("delete from fee")
        elif file.find('inf')!=-1:
            mycur.execute("delete from infra")
        else:
            mycur.execute("delete from schools")
        mydb.commit()
        main()
    elif s=='No':
        main()
    else:
        print("Invalid Choice Re-Enter\n")
        Deleteall()
    
#********************************************************************************************************************************************************************

def droptable():
    s=input("Confirm to Drop Database of {0}?\nType 'yes' or 'no'\n-----------------------------------------\n".format(file.replace('_scrap','')))
    s=s.capitalize()
    if s=='Yes':
        if file.find('tim')!=-1:
            mycur.execute("drop table time")        
        if file.find('fee')!=-1:
            mycur.execute("drop table fee")
        elif file.find('inf')!=-1:
            mycur.execute("drop table infra")
        else:
            mycur.execute("drop table schools")
        main()    
            
    elif s=='No':
        main()
    else:
        print("Invalid Choice Re-Enter\n")
        droptable()

#*********************************************************************************************************************************************************************        

def CreateTable():
    if file.find('tim')!=-1:
        mycur.execute("create table if not exists time(school_id varchar(20),season varchar(30),class varchar(30),start varchar(10),end varchar(10),foreign key(school_id) references schools(school_id))")
    elif file.find('inf')!=-1:
        mycur.execute("create table if not exists infra(school_id varchar(20),library varchar(50),sports varchar(500),labs varchar(500),arts_culture varchar(500),moreinfo varchar(500), foreign key(school_id) references schools(school_id))")
    elif file.find('fee')!=-1:
        mycur.execute("create table if not exists fee(school_id varchar(50),class varchar(50),transp int,reg int,adm int,annual int,moreinfo varchar(200),foreign key(school_id) references schools(school_id))")
    else:
        mycur.execute("create table if not exists schools({0} varchar(20) primary key,{1} varchar(200) default NULL,{2} varchar(200) default NULL,{3} varchar(15) default NULL,{4} varchar(200) default NULL,{5} float default NULL,{6} varchar(200) default NULL)".
             format(data_list[0][0].strip(),data_list[0][1].strip(),data_list[0][2].strip(),data_list[0][3].strip(),data_list[0][4].strip(),data_list[0][5].strip(),data_list[0][6].strip(),file.strip()))

    

#*********************************************************************************************************************************************************************
def main():
        print("[Insert--1","PrintALL--2","Deleteall--3","Create Table--4","Drop table--5","CorrectFile--6","File name--7","FEE_File Correct--8","Exit--0]\n","---------------------------------------------------------------------------")
        try:
            inp=int(input("Enter Choice: "))
            if inp==1:
                insert()
                main()
            elif inp==2:
                printall()
                main()
            elif inp==7:
                ofile()
                main()
            elif inp==3:
                Deleteall()
            elif inp==5:
                droptable()
            elif inp==4:
                CreateTable()
                main()
            elif inp==0:
                pass
            elif inp==6:
                CorrectFile()
                main()
            elif inp==8:
                feefile()
                main()
            else:
                print("Invalid Choice Re-enter:\n","----------------------\n\n")
                main()
        except:
            print("Invalid Choice Re-Enter\n","------------------------\n\n")
            main()
            
#**********************************************************************************************************************************************************************
ofile()       
main()
#quit()    
    
