# -*- coding: utf-8 -*-
import time
import pymssql
import re
import pymysql
import tkinter as tk




class MSSQL:
  def __init__(self,host,user,pwd,db):
    self.host=host
    self.user=user
    self.pwd=pwd
    self.db=db
  def GetConnect(self):
    if not self.db:
      raise(NameError,'没有目标数据库')
    self.connect=pymssql.connect(host=self.host,user=self.user,password=self.pwd,database=self.db,charset='GBK')
    cur=self.connect.cursor()
    if not cur:
      raise(NameError,'数据库访问失败')
    else:
      return cur
  def ExecSql(self,sql):
     cur=self.GetConnect()
     cur.execute(sql)
     self.connect.commit()
     self.connect.close()
  def ExecQuery(self,sql):
    cur=self.GetConnect()
    cur.execute(sql)
    resList = cur.fetchall()
    self.connect.close()
    return resList  

def meituan():
  ms = MSSQL(host="10.200.1.100", user="pwd", pwd="pwd", db="JHFZBH_R2022")
  startstamp1 = e1.get()
  endstamp1 = e2.get()
  print(str(startstamp1 + endstamp1))
  print(("select * from dbo.KFP_GL where KFP_JzSj between '" + startstamp1 + "' And '" + endstamp1 + "'"))
  resList = ms.ExecQuery(
    "select * from dbo.KFP_GL where KFP_JzSj be+2tween '" + startstamp1 + "' And '" + endstamp1 + "'")

  for i in range(len(resList)):
    print (resList[i])
    no1 = re.findall('4\d{18}', str(resList[i]))
    if no1 != []:
      # print(no1)
      for x in range(len(no1)):
        # text1.insert("end", no1[x] + "\n")
        print(no1[x])
        search(str(no1[x]), "meituan")
def xiecheng():
  ms = MSSQL(host="10.200.1.100", user="sa", pwd="sql", db="JHFZBH_R2022")
  startstamp1 = e1.get()
  endstamp1 = e2.get()
  print(str(startstamp1 + endstamp1))
  print(("select * from dbo.KFP_GL where KFP_JzSj between '" + startstamp1 + "' And '" + endstamp1 + "'"))
  resList = ms.ExecQuery(
    "select * from dbo.KFP_GL where KFP_JzSj between '" + startstamp1 + "' And '" + endstamp1 + "'")
  for i in resList:
    no1 = re.findall('16\d{9}', str(i))

    if no1 != []:
      # print(no1)
      for x in range(len(no1)):
        text1.insert("end", no1[x] + "\n")
        print(no1[x])
        search(str(no1[x]),"ctrip")
def feizhu():
  ms = MSSQL(host="10.200.1.100", user="pwd", pwd="pwd", db="JHFZBH_R2022")
  startstamp1 = e1.get()
  endstamp1 = e2.get()
  #print(str(startstamp1 + endstamp1))
  print(("select * from dbo.KFP_GL where KFP_JzSj between '" + startstamp1 + "' And '" + endstamp1 + "'"))
  resList = ms.ExecQuery(
    "select * from dbo.KFP_GL where KFP_JzSj between '" + startstamp1 + "' And '" + endstamp1 + "'")
  for i in resList:
    no1 = re.findall('2\d{18}', str(i))
    if no1 != []:
      # print(no1)
      for x in range(len(no1)):
        text1.insert("end", no1[x] + "\n")
        print(no1[x])
        search(no1[x])
def clear():
  text1.delete("1.0","end")


def search(order_id,pintai):
  conn = pymysql.connect(host='127.0.0.1', port=3306, user='pwd', passwd='pwd', db='orderid', charset='utf8')
  cur = conn.cursor()  # 获取游标

  cur.execute("select * from "+pintai+" where "+pintai+"_order_id='"+order_id+"'")

  # get full data
  out_res = cur.fetchall()

  print(out_res)
    # print(df['订单号'][i], df['入住日期'][i], df['离店日期'][i], df['房型名称'][i], df['客人姓名'][i], df['间夜'][i], df['结算价'][i])

  cur.close()
  conn.commit()
  conn.close()
  #print('sql执行成功')
if __name__ == '__main__':
  master = tk.Tk()
  master.title("平台订单对账")
  tk.Label(master, text="开始：").grid(row=0,column=0,columnspan=1,rowspan=1)
  tk.Label(master, text="结束：").grid(row=1,column=0,columnspan=1,rowspan=1)

  e1 = tk.Entry(master)
  e2 = tk.Entry(master)
  e1.grid(row=0, column=1, padx=10, pady=5)
  e2.grid(row=1, column=1, padx=10, pady=5)
  tk.Button(master,text="clear",command=clear).grid(row=2,column=1,columnspan=1,rowspan=1)
  e1.insert(0, "2021-12-01")
  e2.insert(0, "2021-12-25")
  v = tk.IntVar()
  v.set(2)

  tk.Radiobutton(master, text="美团", variable=v, value=1,indicatoron=False,command=meituan).grid(row=0,column=2,columnspan=1,rowspan=1)
  tk.Radiobutton(master, text="携程", variable=v, value=2,indicatoron=False,command=xiecheng).grid(row=1,column=2,columnspan=1,rowspan=1)
  tk.Radiobutton(master, text="飞猪", variable=v, value=3,indicatoron=False,command=feizhu).grid(row=2,column=2,columnspan=1,rowspan=1)

  text1 = tk.Text(master, width=50, height=50 )
  text1.grid(row=4, column=0,columnspan=3)


  master.mainloop()
#SELECT * FROM [JHFZBH_R2022].[dbo].[KFP_GL] where 结账单备注 like '%16864545523%'
