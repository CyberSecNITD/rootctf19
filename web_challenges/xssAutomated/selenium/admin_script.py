from selenium import webdriver
import mysql.connector
import time


chrome_options = webdriver.ChromeOptions()
# chrome_options.add_argument('--headless')
chrome_options.add_argument('--no-sandbox')

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="xssAutomated"
)

mycursor = mydb.cursor()

while True:
    driver = webdriver.Chrome(options=chrome_options)


    driver.get("http://localhost/xssAutomated/40cc1ec3e6bb0cba8a45d6cdc1d89eb962967de65526412c5065a3a6a9e0c29d.php")
    driver.quit()

    mycursor.execute("DELETE FROM BlogPosts")
    mydb.commit() 

    time.sleep(300)
