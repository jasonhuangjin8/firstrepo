#打开数据库连接，不指定数据库
import os
import pandas
import numpy
import pymysql
#打开数据库连接，不指定数据库
import datetime
import time
#CREATE TABLE meituan(meituan_order_id VARCHAR(20), in_date DATE,out_date DATE,type_room VARCHAR(20) ,guest_name VARCHAR(20),nb_days INT,income FLOAT);
#CREATE TABLE ctrip(ctrip_order_id VARCHAR(20), in_date DATE,out_date DATE,type_room VARCHAR(20) ,guest_name VARCHAR(20),nb_days INT,income FLOAT);
#CREATE TABLE roominfo(id INT(10),fanghao VARCHAR(20), leibie VARCHAR(50),zhuangtai1 VARCHAR(500),louceng VARCHAR(20) ,zhuangtai2 VARCHAR(20),liuyan VARCHAR(500),teshuyaoqiu VARCHAR(500),guest_name VARCHAR(500));
file_dir="C:\\Users\\pc1\\PycharmProjects\\pythonProject\\"
def main():
    for root, dirs, files in os.walk(file_dir):
        for file in files:
            if "对账" in file:
                print(file)
                df = pandas.read_excel(file, sheet_name='团购结账明细表',header=3,skipfooter=1,usecols=['预订账号', '抵店时间','结账时间','姓名','房号'])
                conn=pymysql.connect(host='10.200.1.100', port=3306, user='huang', passwd='huang520', db='orderid', charset='utf8')

                cur=conn.cursor()#获取游标
                #另一种插入数据的方式，通过字符串传入值

                for i in df.index:
                    if "|" in str(df['预订账号'][i]):
                        list=str(df['预订账号'][i]).split("|")
                        #print(list)
                        for l in range(len(list)):
                            inputline = str(list[l])
                            select_sql = "SELECT * FROM ordernumbs where ordernumbs = '%s'" % inputline
                            count = cur.execute(select_sql);
                            if count == 0:
                                print('未发现单号在数据库中：'+list[l]+str(df['姓名'][i])+'    进店：'+str(df['抵店时间'][i])+'    离店：'+str(df['结账时间'][i])+' 房间号：'+str(df['房号'][i]))
                    elif (df['预订账号'][i]) is numpy.nan:
                        print('没有预订单号在对账中： '+str(df['姓名'][i])+'    进店：'+str(df['抵店时间'][i])+'    离店：'+str(df['结账时间'][i])+' 房间号：'+str(df['房号'][i]))
                    else:
                        # print(str(df['预订账号'][i]))
                        select_sql = "SELECT * FROM ordernumbs where ordernumbs = '%s'" % inputline
                        count = cur.execute(select_sql);
                        if count == 0:
                            print('未发现单号在数据库中：'+str(df['预订账号'][i])+str(df['姓名'][i])+'    进店：'+str(df['抵店时间'][i])+'    离店：'+str(df['结账时间'][i])+' 房间号：'+str(df['房号'][i]))

                cur.close()
                conn.commit()
                conn.close()

if __name__ == '__main__':
    main()