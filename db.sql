-- Buat database
CREATE DATABASE uas_listfilm;

-- Gunakan database yang baru dibuat
USE uas_listfilm;

-- Buat tabel user
CREATE TABLE `login` (
  `id_user` INT AUTO_INCREMENT PRIMARY KEY,
  `password` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB;

-- Buat tabel table_category
CREATE TABLE `table_category` (
  `id_category` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Buat tabel table_film
CREATE TABLE `table_film` (
  `id_film` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `nama_film` VARCHAR(255) NOT NULL,
  `id_category` INT NOT NULL,
  `rating` VARCHAR(10) NOT NULL,  
  `status` INT NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `login` (`id_user`) ON DELETE CASCADE,
  FOREIGN KEY (`id_category`) REFERENCES `table_category` (`id_category`) ON DELETE CASCADE
) ENGINE=InnoDB;
