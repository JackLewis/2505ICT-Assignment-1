drop table if exists items;

create table items (
    itemID int not null auto_increment primary key,
    name varchar(45) not null,
    description text default '',
    categoryID int,
    vendor varchar(45) not null,
    startPrice float
);

drop table if exists category;

create table category (
    categoryID int not null auto_increment,
    category varchar(45),
    categoryDescription text default '',
    foreign key (categoryID) references items(categoryID)
);

insert into category (category, categoryDescription)
values
("Collectibles & Art",
"Valuable, rare or unique items and pieces of art including paintings and sculptures"),
("Electronics",
"Everything electrical, computers, mobile devices, appliances, hi-fi and gadgets"),
("Entertainment & Books",
"Cd's, DVD's, Blu-rays, records and other entertainment mediums aswell as books"),
("Health & Beauty",
"Make-up, skin care and other health and beauty items"),
("Home & Garden",
"Gardening equipment, outdoor living and DIY"),
("Fashion",
"Male and female clothing and accesories"),
("Motoring",
"Cars, bikes, boats, caravans and parts and accesories"),
("Sports & Recreation",
"Sporting equipment, bicycles, canoes and other recreational equipment"),
("Toys & Hobbies",
"Toys, board-games, models and other hobbie items");

insert items(name, description, categoryID, vendor, startPrice)
values
("Original Mona Lisa by Da Vinci",
"The original painting, previously kept at the world famous Lourve",
"1",
"shadyArtDealer",
"100,000,000"),
("Laptop",
"New windows laptop",
"2",
"laptopseller2012",
"500"),
("Harry Potter collection, books and dvds",
"A full collection of all the books and dvds",
"3",
"harrypotterfan",
"150"),
("Electric men's groomer",
"5 different attachments, rechargeable battery",
"4",
"fancy_man_5000",
"60"),
("2008 Audi A5 - Automatic",
"Email to arrange test-drive",
"7",
"Gold_Coast_Audi_Online",
"60000");

