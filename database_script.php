db name : dghs

table creation script :


CREATE TABLE `student_reg` (
`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` varchar(50) DEFAULT NULL,
`fathers_name` varchar(100) DEFAULT NULL,
`mothers_name` varchar(100) DEFAULT NULL,
`class` int(11) NOT NULL,
`birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;