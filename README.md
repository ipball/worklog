# worklog
ระบบ สมาชิกและจัดเก็บข้อมูล login
# การติดตั้ง
1. ปรับแต่งฐานข้อมูลให้ตรงกับ SERVER ในไฟล์ database.php (แก้ไข ตามคอมเม้น)
2. ปรับแต่งไฟล์ setting.php ในฟังก์ชั่น site_url ให้ตรงกับ url หลักของโปรเจคงาน
    ตัวอย่าง
      กรณีเว็บหลักเป็น www.itoffside.com
      return 'http://localhost/worklog/'.$value; แก้ไขเป็น return 'http://www.test.com/'.$value;
3. ทดลองใช้งาน
  ตัวอย่าง
    user : admin , password : 1234
    user : demo , password : 1111
