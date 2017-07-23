How to install

1. Config การเชื่อมต่อฐานข้อมูลในไฟล์ [project_name]/config/config_host.php

define("HOST",ชื่อ host);
define("USER",username);
define("PWD",password);
define("DB_NAME",ชื่อฐานข้อมูลที่จะทำการเชื่อมต่อ);

2. สร้างฐานข้อมูล อ้างอิงชื่อตาม define DB_NAME

3. เรียก URL ตาม Link ด้านล่างเพื่อ install project
http://[SERVER_NAME]/[Project_name]/install.php ตัวอย่าง http://localhost/academe/install.php

4. เรียก URL ตาม Link เพื่อเข้าหน้าหลักของระบบ
http://[SERVER_NAME]/[Project_name]/app/main/ ตัวอย่าง http://localhost/academe/app/main

5. User & password เริ่มต้น
user : test_user
pass : test1234