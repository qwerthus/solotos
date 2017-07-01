CREATE TABLE bookings (
bookingId INTEGER PRIMARY KEY AUTOINCREMENT,
hotelId int(12) NOT NULL,
userId int(12) NOT NULL
);
CREATE TABLE hotels (
hotelId INTEGER PRIMARY KEY AUTOINCREMENT,
name varchar(128) NOT NULL,
description varchar(512) NOT NULL,
imageUrl varchar(512) NOT NULL,
star int(1) NOT NULL,
price decimal(12,0) NOT NULL
);
CREATE TABLE users (
userId INTEGER PRIMARY KEY AUTOINCREMENT,
email varchar(128) NOT NULL,
password varchar(512) NOT NULL
);

INSERT INTO hotels (hotelId,name,description,imageUrl,star,price) VALUES (1,"Taj Palace","Superstar hotel which placed in India","https://taj.tajhotels.com/content/dam/luxury/hotels/taj-palace-delhi/images/master2/16x7/38849817-H1-Exterior_1-16x7.jpg",5,750000),(2,"Bellagio Hotel","Awesome hotel in Las Vegas. Feel free to stay with us!!","https://exp.cdn-hotels.com/hotels/1000000/150000/140600/140596/140596_275_z.jpg",4,600000),(3,"Florida Hotel","Great hotel tuned in Orlando Beach!! Dont say youre American if you havent stayed here!","http://www.thefloridahotelorlando.com/var/floridahotelorlando/storage/images/media/images/photo-gallery/hotel-images/florida-hotel-exteriror-shot-pool/26985-1-eng-US/Florida-Hotel-Exteriror-Shot-Pool.jpg",4,650000);

INSERT INTO users (userId,email,password) VALUES (1,"admin@bookinglah.com","admin"),(2,"user@example.com","user");