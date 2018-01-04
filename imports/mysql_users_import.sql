load data local infile '/Users/ismailcam/Downloads/users.csv' into table users fields terminated by ','
  enclosed by '"'
  lines terminated by '\n'
    (username, password)

load data local infile '/Users/ismailcam/Downloads/more_users 2.csv' into table users fields terminated by ','
  enclosed by '"'
  lines terminated by '\n'
    (username, password)