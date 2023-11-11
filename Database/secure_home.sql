
-- Database structure for `secure_home`
create database Secure_home;

-- Table structure for table `user`
create table user(
userID Integer AUTO_INCREMENT primary key,
firstName varchar(255)not null,
lastName varchar(255) not null,
age integer check (age>=18),
phoneNumber varchar(10),
userName varchar(100) not null,
emailAddress varchar(50),
password varchar(50) not null,
userType varchar(10),
check( emailAddress LIKE '%___@___%.__%'),
check( userType LIKE ('admin' or 'user')),
streetName varchar(100),
city varchar(100),
state varchar(100),
postalCode integer(6),
code VARCHAR(255),
photo VARCHAR(255)
);

-- Table structure for table `apartment`
CREATE TABLE Apartment(
apartId INTEGER AUTO_INCREMENT PRIMARY KEY,
apartmentType VARCHAR(100),
numberOfRoom INTEGER,
userID INTEGER REFERENCES User(userID)
); 

-- Table structure for table `room`
CREATE TABLE Room (
roomId INTEGER AUTO_INCREMENT PRIMARY KEY,
roomType VARCHAR(100),
deviceID integer references Device(deviceID),
apartId INTEGER REFERENCES Apartment(apartID)
);

-- Table structure for table `device`
create table Device(
deviceID integer AUTO_INCREMENT primary key,
deviceName varchar(100),
deviceType varchar(100)
);

-- Table structure for table `deviceStatus`
create table DeviceStatus(
devicestatusID integer AUTO_INCREMENT primary key,
dStatus bool not null default false,
timeActivated time,
timeDeactivated time,
deviceID integer references Device(deviceID),
userID integer references User(userID)
);

-- Table structure for table `Public Authority`
create table PublicAuthority(
authorityID integer AUTO_INCREMENT primary key,
name varchar(60) not null,
emailAddress varchar(60), 
check( emailAddress LIKE '%___@___%.__%'),
address varchar(250),
phoneNumber varchar(10)
);

-- Table structure for table `Message`
create table Message(
mID integer AUTO_INCREMENT primary key,
mTime time,
content text(3000),
userID integer references User(userID)
);

-- Table structure for table `alert`
create table Alert(
alertID integer AUTO_INCREMENT primary key,
aDate date,
aTime time,
authorityID integer references PublicAuthority(authorityID),
userID integer references User(userID)
);
 
 -- Table structure for table `contactus`
CREATE TABLE contactus (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
message VARCHAR(500) NOT NULL
);