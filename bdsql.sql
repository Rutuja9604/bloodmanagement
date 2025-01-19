-- Creating table for be a donor page
CREATE TABLE donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    weight INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    city VARCHAR(50) NOT NULL,
    blood_group VARCHAR(5) NOT NULL,
    last_donation_date DATE NOT NULL,
    password VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL
);

-- Creating table for request page
CREATE TABLE blood_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    email VARCHAR(255) NOT NULL,
    blood_group VARCHAR(5) NOT NULL,
    num_units INT NOT NULL
);


-- Creating table for feedback page
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    opinion TEXT NOT NULL,
    submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Creating table for admin page
CREATE TABLE user_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
INSERT INTO `user_admin` (`id`, `username`, `password`) VALUES
(111, 'admin', 'Admin@2024');

