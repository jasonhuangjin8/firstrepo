
import pandas
import pymysql
#打开数据库连接，不指定数据库
import os
import datetime

file_dir="C:\\Users\\pc1\\PycharmProjects\\pythonProject\\"

def main():

    for root, dirs, files in os.walk(file_dir):
        for file in files:
            if "酒店" in file:
                print(file)
                df = pandas.read_excel(file, sheet_name='订单详情',usecols=['美团订单号'])


                conn=pymysql.connect(host='10.200.1.100', port=3306, user='pwd', passwd='pwd', db='orderid', charset='utf8')

                cur=conn.cursor()#获取游标
                #另一种插入数据的方式，通过字符串传入值
                sql = "insert into ordernumbs values(%s)"

                for i in df.index:
                    inputline=str(df['美团订单号'][i])
                    select_sql = "SELECT * FROM ordernumbs where ordernumbs = '%s'" % inputline
                    count = cur.execute(select_sql);
                    if count == 0 :
                        cur.execute(sql,(df['美团订单号'][i]))
                    #(df['美团订单号'][i],'kongsh',20))

                cur.close()
                conn.commit()
                conn.close()
                print('sql执行成功')
                # newname="美团"+str(datetime.datetime.now())+".xlsx"
                # os.rename(file, newname)
            if "statement" in file:
                print(file)
                df = pandas.read_excel(file, sheet_name='预付订单明细',header=1,skipfooter=1,usecols=['订单号'])


                conn=pymysql.connect(host='10.200.1.100', port=3306, user='pwd', passwd='pwd', db='orderid', charset='utf8')

                cur=conn.cursor()#获取游标
                #另一种插入数据的方式，通过字符串传入值
                sql = "insert into ordernumbs values(%s)"

                for i in df.index:
                    inputline=str(df['订单号'][i])
                    select_sql = "SELECT * FROM ordernumbs where ordernumbs = '%s'" % inputline
                    count = cur.execute(select_sql);
                    if count == 0 :
                        cur.execute(sql,(df['订单号'][i]))
                    #(df['美团订单号'][i],'kongsh',20))

                cur.close()
                conn.commit()
                conn.close()
                print('sql执行成功')
                # newname="美团"+str(datetime.datetime.now())+".xlsx"
                # os.rename(file, newname)
            if "日历房账单" in file:
                print(file)
                df = pandas.read_excel(file, sheet_name='日历房账单',header=2,usecols=['订单号'])


                conn=pymysql.connect(host='10.200.1.100', port=3306, user='huang', passwd='huang520', db='orderid', charset='utf8')

                cur=conn.cursor()#获取游标
                #另一种插入数据的方式，通过字符串传入值
                sql = "insert into ordernumbs values(%s)"

                for i in df.index:
                    inputline=str(df['订单号'][i])
                    select_sql = "SELECT * FROM ordernumbs where ordernumbs = '%s'" % inputline
                    count = cur.execute(select_sql);
                    if count == 0 :
                        cur.execute(sql,(df['订单号'][i]))
                    #(df['美团订单号'][i],'kongsh',20))

                cur.close()
                conn.commit()
                conn.close()
                print('sql执行成功')
                # newname="美团"+str(datetime.datetime.now())+".xlsx"
                # os.rename(file, newname)
if __name__ == '__main__':
    main()
