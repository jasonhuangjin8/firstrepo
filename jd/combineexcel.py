# -*- coding:utf-8 -*-

import xlrd,xlsxwriter
import os


allxls=[]
#目标excel
end_xls="C:\\Users\\pc1\\PycharmProjects\\pythonProject\\to.xlsx"
file_dir="C:\\Users\\pc1\\PycharmProjects\\pythonProject\\"

def file_name(file_dir):
    for root, dirs, files in os.walk(file_dir):

        for file in files:
            if "方舟" in file:
                allxls.append(file)
#待合并excel



def open_xls(file):
    try:
        fh=xlrd.open_workbook(file)
        return fh
    except Exception as e:
        print("打开文件错误："+e)


#根据excel名以及第几个标签信息就可以得到具体标签的内容
def get_file_value(filename,sheetnum):
    rvalue=[]
    fh=open_xls(filename)
    sheet=fh.sheets()[sheetnum]
    row_num=sheet.nrows
    for rownum in range(0,row_num):
        rvalue.append(sheet.row_values(rownum))
    return rvalue

def mainrun():
    #获取第一个excel的sheet个数以及名字作为标准
    first_file_fh=open_xls(allxls[0])
    first_file_sheet=first_file_fh.sheets()
    first_file_sheet_num=len(first_file_sheet)
    sheet_name=[]
    for sheetname in first_file_sheet:
        sheet_name.append(sheetname.name)


    #定义一个目标excel
    endxls=xlsxwriter.Workbook(end_xls)

    all_sheet_value=[]

    #把所有内容都放到列表all_sheet_value中
    for sheet_num in range(0,first_file_sheet_num):
        all_sheet_value.append([])
        for file_name in allxls:
            print("正在读取"+file_name+"的第"+str(sheet_num+1)+"个标签...")
            file_value=get_file_value(file_name,sheet_num)
            all_sheet_value[sheet_num].append(file_value)

    #print(all_sheet_value)

    num=-1
    sheet_index=-1

    #将列表all_sheet_value的内容写入目标excel
    for sheet in all_sheet_value:
        sheet_index+=1
        end_xls_sheet=endxls.add_worksheet(sheet_name[sheet_index])
        num+=1
        num1=-1
        for sheet1 in sheet:
            for sheet2 in sheet1:
                num1+=1
                num2=-1
                for sheet3 in sheet2:
                    num2+=1
                    #print(num,num1,num2,sheet3)
                    #在第num1行的第num2列写入sheet3的内容
                    end_xls_sheet.write(num1,num2,sheet3)


    endxls.close()
if __name__ == '__main__':
    file_name(file_dir)
    print(allxls)
    mainrun()