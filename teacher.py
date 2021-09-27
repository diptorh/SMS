from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome(ChromeDriverManager().install())

driver.get("http://localhost/SMS-master/teacher.php")

name = driver.find_element_by_xpath('/html/body/div[1]/div/div[1]/div/div[2]/form/div[1]/input')
phone = driver.find_element_by_xpath('/html/body/div[1]/div/div[1]/div/div[2]/form/div[2]/input')
email = driver.find_element_by_xpath('/html/body/div[1]/div/div[1]/div/div[2]/form/div[3]/input')
address = driver.find_element_by_xpath('/html/body/div[1]/div/div[1]/div/div[2]/form/div[4]/input')
did = driver.find_element_by_xpath('/html/body/div[1]/div/div[1]/div/div[2]/form/div[5]/input')
dob = driver.find_element_by_xpath('/html/body/div[1]/div/div[1]/div/div[2]/form/div[6]/input')
gender = driver.find_element_by_xpath('//*[@id="class"]')

submit = driver.find_element_by_xpath('/html/body/div[1]/div/div[1]/div/div[2]/form/div[9]/button')

name.send_keys('Mr. Z')
phone.send_keys('01766433')
email.send_keys('z@gmail.com')
address.send_keys('Dhaka')
did.send_keys('77778')
dob.send_keys('1996-07-12')
gender.send_keys("Male")

submit.click()

time.sleep(3)

print('Title: ', driver.find_element_by_xpath('/html/body/div[1]/div/div[2]/div/div[2]/div/table/tbody/tr[5]').text)

