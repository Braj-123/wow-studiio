-- ==============================================================
-- WEDDING PLATFORM MASTER DATABASE SCHEMA
-- Database: wedding_db
-- ==============================================================

CREATE DATABASE IF NOT EXISTS `wedding_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `wedding_db`;

-- 1. Admins Table
CREATE TABLE IF NOT EXISTS `admins` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `name` VARCHAR(100) NOT NULL DEFAULT 'Wedding Admin',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Default Admin (Password: Admin@123)
INSERT INTO `admins` (`username`, `email`, `password`, `name`) 
VALUES ('admin', 'admin@wedding.com', '$2y$10$wOqJ3aOq0M9F3a5vJ9zD9eX4y5P5C9T7wJ9zD9eX4y5P5C9T7wJ9z', 'Wedding Host')
ON DUPLICATE KEY UPDATE `username` = `username`;

-- 2. Wedding Master Settings
CREATE TABLE IF NOT EXISTS `wedding_settings` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `groom_name` VARCHAR(100) NOT NULL DEFAULT 'Manish',
    `bride_name` VARCHAR(100) NOT NULL DEFAULT 'Priya',
    `groom_bio` TEXT NULL,
    `bride_bio` TEXT NULL,
    `groom_photo` VARCHAR(255) NULL,
    `bride_photo` VARCHAR(255) NULL,
    `wedding_date` DATETIME NOT NULL DEFAULT '2026-12-18 19:30:00',
    `venue_name` VARCHAR(200) NOT NULL DEFAULT 'The Grand Heritage Palace & Resorts',
    `venue_address` TEXT NOT NULL,
    `venue_map_url` TEXT NULL,
    `contact_phone` VARCHAR(50) NOT NULL DEFAULT '+91 98765 43210',
    `contact_email` VARCHAR(100) NOT NULL DEFAULT 'info@manishwedspriya.com',
    `hero_title` VARCHAR(255) NOT NULL DEFAULT 'We Are Getting Married!',
    `hero_subtitle` VARCHAR(255) NOT NULL DEFAULT 'Join us to celebrate the auspicious union of two souls and families.',
    `invitation_text` TEXT NULL,
    `bg_music_url` VARCHAR(255) NULL,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Default Settings
INSERT INTO `wedding_settings` (`id`, `groom_name`, `bride_name`, `groom_bio`, `bride_bio`, `wedding_date`, `venue_name`, `venue_address`, `invitation_text`)
VALUES (
    1, 
    'Manish', 
    'Priya', 
    'An entrepreneur with a gentle heart, tech enthusiast, and ready to embark on this beautiful forever journey.', 
    'A creative designer with an infectious smile, classical music lover, and bringing warmth to everyone around.',
    '2026-12-18 19:30:00', 
    'The Grand Heritage Palace & Resorts', 
    'Royal Palace Road, Near Crystal Lake, Udaipur, Rajasthan - 313001',
    'With the divine blessings of our beloved parents and ancestors, we cordially invite you and your family to grace our joyous wedding celebrations.'
)
ON DUPLICATE KEY UPDATE `id` = 1;

-- 3. Couple Love Story (About)
CREATE TABLE IF NOT EXISTS `couple_story` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NOT NULL,
    `story_date` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `image` VARCHAR(255) NULL,
    `order_num` INT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `couple_story` (`title`, `story_date`, `description`, `order_num`) VALUES
('How We First Met', '15 October 2023', 'A chance coffee encounter on a rainy autumn evening sparked conversations that felt like we had known each other for lifetimes.', 1),
('The First Official Date', '14 February 2024', 'Under starlit skies by the serene lakeside, sharing laughter, dreams, and realizing this bond was destined for something extraordinary.', 2),
('The Proposal', '10 August 2025', 'With fluttering hearts and roses in hand, the golden question was asked, followed by the sweetest "YES!" and happy tears.', 3),
('The Wedding Day', '18 December 2026', 'Today, with sacred mantras and seven sacred vows around the holy fire, we begin our eternal chapter together.', 4);

-- 4. Wedding Events Timeline
CREATE TABLE IF NOT EXISTS `wedding_events` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NOT NULL,
    `event_date` DATE NOT NULL,
    `start_time` VARCHAR(50) NOT NULL,
    `end_time` VARCHAR(50) NULL,
    `venue` VARCHAR(200) NOT NULL,
    `address` TEXT NOT NULL,
    `dress_code` VARCHAR(100) NULL,
    `map_link` TEXT NULL,
    `description` TEXT NULL,
    `image` VARCHAR(255) NULL,
    `order_num` INT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `wedding_events` (`title`, `event_date`, `start_time`, `end_time`, `venue`, `address`, `dress_code`, `description`, `order_num`) VALUES
('Haldi Ceremony', '2026-12-16', '10:00 AM', '01:00 PM', 'Courtyard Garden Lawn', 'The Grand Heritage Palace, Udaipur', 'Shades of Yellow & Sunshine Attire', 'A joyous splash of turmeric, music, and playful moments to bestow blessings.', 1),
('Mehndi & Sangeet Night', '2026-12-17', '06:00 PM', '11:30 PM', 'Royal Crystal Ballroom', 'The Grand Heritage Palace, Udaipur', 'Indo-Western & Glamorous Ethnic', 'Intricate henna designs, foot-tapping family dance performances, and musical euphoria.', 2),
('The Royal Wedding (Varmala & Pheras)', '2026-12-18', '07:00 PM', 'Midnight', 'Main Palace Mandapam', 'The Grand Heritage Palace, Udaipur', 'Royal Traditional / Sherwani & Lehengas', 'The sacred vows, floral garlands, and pious pheras under the blessings of our elders.', 3),
('Grand Reception & Dinner', '2026-12-19', '08:00 PM', 'Midnight', 'Imperial Lakeside Pavilion', 'The Grand Heritage Palace, Udaipur', 'Black Tie / Evening Elegance', 'An evening of celebration, gourmet feast, toasts, and celebrating the newlyweds.', 4);

-- 5. Wedding Services / Guest Amenities
CREATE TABLE IF NOT EXISTS `wedding_services` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NOT NULL,
    `description` TEXT NOT NULL,
    `icon` VARCHAR(100) NOT NULL DEFAULT 'bi-heart',
    `contact_person` VARCHAR(100) NULL,
    `contact_phone` VARCHAR(50) NULL,
    `order_num` INT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `wedding_services` (`title`, `description`, `icon`, `contact_person`, `contact_phone`, `order_num`) VALUES
('Luxury Stay & Hospitality', 'Comfortable resort suites arranged for all our esteemed guests with 24/7 room service.', 'bi-house-heart', 'Rajesh Sharma', '+91 98765 11111', 1),
('Airport & Station Transfers', 'Dedicated luxury cabs and shuttles available round-the-clock for guest pick and drop.', 'bi-car-front-fill', 'Vikram Singh', '+91 98765 22222', 2),
('Royal Multi-Cuisine Feast', 'Exquisite vegetarian & royal authentic culinary treats prepared by master chefs.', 'bi-cup-hot-fill', 'Chef Kapoor', '+91 98765 33333', 3),
('24/7 Guest Assistance Desk', 'Dedicated helpdesk in the hotel lobby for any room assistance, itinerary, or local queries.', 'bi-headset', 'Pooja Verma', '+91 98765 44444', 4);

-- 6. Wedding Team & Family Members
CREATE TABLE IF NOT EXISTS `wedding_team` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NOT NULL,
    `relation_role` VARCHAR(150) NOT NULL,
    `side` ENUM('groom', 'bride') NOT NULL DEFAULT 'groom',
    `photo` VARCHAR(255) NULL,
    `phone` VARCHAR(50) NULL,
    `bio` TEXT NULL,
    `order_num` INT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `wedding_team` (`name`, `relation_role`, `side`, `bio`, `order_num`) VALUES
('Rameshwar & Sunita', 'Groom''s Parents', 'groom', 'Guiding pillars of the groom''s life and welcoming everyone with open arms.', 1),
('Kailash & Meenakshi', 'Bride''s Parents', 'bride', 'Proud parents bestowing all their love and blessings upon the happy couple.', 2),
('Aman Sharma', 'Best Man / Groom''s Brother', 'groom', 'Partner-in-crime and ensuring every guest has an unforgettable celebration.', 3),
('Neha Singhania', 'Maid of Honor / Bride''s Sister', 'bride', 'The bride''s heartbeat, coordinator of all dance performances and cheer.', 4);

-- 7. Gallery Table
CREATE TABLE IF NOT EXISTS `gallery` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NULL,
    `category` VARCHAR(50) NOT NULL DEFAULT 'pre-wedding',
    `image_url` VARCHAR(255) NOT NULL,
    `order_num` INT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. RSVP Table
CREATE TABLE IF NOT EXISTS `rsvps` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `guest_name` VARCHAR(150) NOT NULL,
    `guest_email` VARCHAR(150) NULL,
    `guest_phone` VARCHAR(50) NOT NULL,
    `guest_count` INT NOT NULL DEFAULT 1,
    `attending` ENUM('attending', 'not_attending', 'maybe') NOT NULL DEFAULT 'attending',
    `meal_preference` ENUM('veg', 'non_veg', 'jain') NOT NULL DEFAULT 'veg',
    `notes` TEXT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Guestbook / Wishes Table
CREATE TABLE IF NOT EXISTS `wishes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `guest_name` VARCHAR(150) NOT NULL,
    `relation` VARCHAR(100) NULL,
    `message` TEXT NOT NULL,
    `status` ENUM('approved', 'pending') NOT NULL DEFAULT 'approved',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `wishes` (`guest_name`, `relation`, `message`, `status`) VALUES
('Uncle Sharma & Family', 'Family Friend', 'Heartiest congratulations to Manish & Priya! Wishing you both a lifetime of love, joy, and togetherness.', 'approved'),
('Dr. Alok Verma', 'Colleague', 'May your marriage be blessed with eternal love, harmony, and prosperity. Excited to be there!', 'approved');
