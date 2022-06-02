
import pandas
import pymysql
#打开数据库连接，不指定数据库
import os
import datetime
import time
#CREATE TABLE meituan(meituan_order_id VARCHAR(20), in_date DATE,out_date DATE,type_room VARCHAR(20) ,guest_name VARCHAR(20),nb_days INT,income FLOAT);
#CREATE TABLE ctrip(ctrip_order_id VARCHAR(20), in_date DATE,out_date DATE,type_room VARCHAR(20) ,guest_name VARCHAR(20),nb_days INT,income FLOAT);
#CREATE TABLE roominfo(id INT(10),fanghao VARCHAR(20), leibie VARCHAR(50),zhuangtai1 VARCHAR(500),louceng VARCHAR(20) ,zhuangtai2 VARCHAR(20),liuyan VARCHAR(500),teshuyaoqiu VARCHAR(500),guest_name VARCHAR(500));

def main():

    for root, dirs, files in os.walk(file_dir):
        for file in files:
            if "statement" in file:
                print(file)
                df = pandas.read_excel(file, sheet_name='预付订单明细',header=1,skipfooter=1,usecols=['订单号', '入住日期','离店日期','房型名称','客人姓名','间夜','结算价'])


                conn=pymysql.connect(host='127.0.0.1', port=3306, user='pwd', passwd='yR3*pwd', db='orderid', charset='utf8')

                cur=conn.cursor()#获取游标
                #另一种插入数据的方式，通过字符串传入值
                sql = "insert into ctrip values(%s,%s,%s,%s,%s,%s,%s)"

                for i in df.index:
                    cur.execute(sql,(df['订单号'][i], str(datetime.datetime.now().year)+"-"+df['入住日期'][i], str(datetime.datetime.now().year)+"-"+df['离店日期'][i], df['房型名称'][i], df['客人姓名'][i], df['间夜'][i], df['结算价'][i]))

                    #print(df['订单号'][i], df['入住日期'][i], df['离店日期'][i], df['房型名称'][i], df['客人姓名'][i], df['间夜'][i], df['结算价'][i])

                cur.close()
                conn.commit()
                conn.close()
                print('sql执行成功')
                newname = "携程" + str(time.strftime('.%Y-%m-%d',time.localtime(time.time()))) + ".xlsx"
                # os.rename(file, newname)
file_dir="C:\\Users\\pc1\\PycharmProjects\\pythonProject\\"


if __name__ == '__main__':
    main()
    print(str(time.strftime('.%Y.%m.%d',time.localtime(time.time()))))
