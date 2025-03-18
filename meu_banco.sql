-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 07:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

--
-- Database: `projecto_vagas`
--
CREATE DATABASE IF NOT EXISTS `projecto_vagas` DEFAULT CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_general_ci;

USE `projecto_vagas`;

-- --------------------------------------------------------
--
-- Table structure for table `vagas`
--
CREATE TABLE
    `vagas` (
        `id` int (11) NOT NULL,
        `titulo` varchar(255) NOT NULL,
        `descricao` text NOT NULL,
        `activo` enum ('s', 'n') NOT NULL,
        `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;

COMMIT;