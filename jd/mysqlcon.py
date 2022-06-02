
import pymysql



conn=pymysql.connect(host='101.43.22.61', port=3306, user='hotel', passwd='yR3*wJKAjPXZ27Xt8ZXH', db='hotel_system', charset='utf8')

cur=conn.cursor()#获取游标
#另一种插入数据的方式，通过字符串传入值
sql = "insert into ordernumbs values(%s)"


select_sql = "SELECT VERSION()"
count = cur.execute(select_sql);
data = count.fetchone()
print("Database version : %s " % data)
cur.close()
conn.commit()
conn.close()