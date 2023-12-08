-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 07:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snap&go`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttbl`
--

CREATE TABLE `appointmenttbl` (
  `AppointmentID` varchar(11) NOT NULL,
  `ProgramName` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `QRCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointmenttbl`
--

INSERT INTO `appointmenttbl` (`AppointmentID`, `ProgramName`, `Date`, `FirstName`, `LastName`, `Status`, `QRCode`) VALUES
('APP01', 'VACCINATION', '2023-01-02', 'WENDY', 'SHON', 'Approved', '1701909535.png'),
('APP02', 'CONSULTATION', '2023-01-02', 'KATIE YERI', 'DIMAGIBA', 'Approved', '1701909536.png'),
('APP03', 'CONSULTATION', '2023-01-09', 'JOOHYUN', 'BAE', 'Approved', '1701909537.png'),
('APP04', 'VACCINATION', '2023-01-09', 'JOHN NELDINE', 'ABRAHAN', 'Approved', '1701909539.png'),
('APP05', 'VACCINATION', '2023-01-09', 'XYRUZ YUAN', 'YI', 'Approved', '1701909540.png'),
('APP06', 'VACCINATION', '2023-02-15', 'MARK', 'LEE', 'Rejected', ''),
('APP07', 'CONSULTATION', '2023-02-15', 'POOMPAT', 'LAMSANG', 'Approved', '1701909573.png'),
('APP08', 'CONSULTATION', '2023-02-17', 'KAO', 'NOPPAKAO', 'Approved', '1701909574.png'),
('APP09', 'CONSULTATION', '2023-02-20', 'JOY', 'PARK', 'Approved', '1701909574.png'),
('APP10', 'CONSULTATION', '2023-02-20', 'SAKURA', 'MIYAWAKI', 'Approved', '1701909575.png'),
('APP11', 'CONSULTATION', '2023-02-22', 'PRINCESS ZHANDIE', 'CEPILLO', 'Approved', '1701909577.png'),
('APP12', 'VACCINATION', '2023-02-22', 'CERILLA', 'MAGNAYE', 'Rejected', ''),
('APP13', 'CONSULTATION', '2023-02-22', 'KEN ', 'LAZARO', 'Approved', '1701909580.png'),
('APP14', 'VACCINATION', '2023-02-24', 'RIKA', 'YUKIRO', 'Approved', '1701909580.png'),
('APP15', 'CONSULTATION', '2023-02-27', 'VAN', 'KITARO', 'Approved', '1701909581.png'),
('APP16', 'VACCINATION', '2023-02-27', 'JANN', 'KALRO', 'Approved', '1701909581.png'),
('APP17', 'CONSULTATION', '2023-02-27', 'Jude ', 'CEPILLO', 'Approved', '1701909581.png'),
('APP18', 'CONSULTATION', '2023-03-06', 'TOBIAS', 'FAULKNER', 'Approved', '1701909582.png'),
('APP19', 'CONSULTATION', '2023-03-08', 'LIAM', 'TAPIA', 'Approved', '1701909583.png'),
('APP20', 'CONSULTATION', '2023-03-08', 'WENDY', 'SHON', 'Approved', '1701909584.png'),
('APP21', 'VACCINATION', '2023-03-10', 'SAKURA', 'MIYAWAKI', 'Approved', '1701909584.png'),
('APP22', 'VACCINATION', '2023-03-13', 'XYRUZ YUAN', 'YI', 'Approved', '1701909585.png'),
('APP23', 'CONSULTATION', '2023-03-13', 'POOMPAT', 'LAMSANG', 'Approved', '1701909586.png'),
('APP24', 'CONSULTATION', '2023-03-29', 'WESLEY', 'CAMACHO', 'Approved', '1701909590.png'),
('APP25', 'CONSULTATION', '2023-03-29', 'KATIE YERI', 'DIMAGIBA', 'Rejected', ''),
('APP26', 'VACCINATION', '2023-03-29', 'LUISA', 'MORSE', 'Approved', '1701909590.png'),
('APP27', 'CONSULTATION', '2023-04-07', 'RIKA', 'YUKIRO', 'Approved', '1701909591.png'),
('APP28', 'VACCINATION', '2023-05-06', 'LILY', 'SOLOMON', 'Approved', '1701909591.png'),
('APP29', 'CONSULTATION', '2023-05-10', 'SAKURA', 'MIYAWAKI', 'Approved', '1701909592.png'),
('APP30', 'VACCINATION', '2023-05-19', 'JUDE ', 'LAZARO', 'Approved', '1701909603.png'),
('APP31', 'CONSULTATION', '2023-05-26', 'PRINCESS ZHANDIE', 'CEPILLO', 'Rejected', ''),
('APP32', 'CONSULTATION', '2023-06-19', 'MARK', 'LEE', 'Approved', '1701909603.png'),
('APP33', 'VACCINATION', '2023-06-26', 'VAN ', 'KITARO', 'Approved', '1701909604.png'),
('APP34', 'CONSULTATION', '2023-07-21', 'KEN ', 'LAZARO', 'Approved', '1701909604.png'),
('APP35', 'CONSULTATION', '2023-10-13', 'MAXIMUS', 'DUFFY', 'Approved', '1701909606.png'),
('APP36', 'VACCINATION', '2023-10-23', 'JOY ', 'PARK', 'Approved', '1701909607.png'),
('APP37', 'VACCINATION', '2023-11-15', 'VAN', 'KITARO', 'Approved', '1701909608.png'),
('APP38', 'VACCINATION', '2023-11-24', 'ROWAN ', 'CRUZ', 'Pending', ''),
('APP40', 'CONSULTATION', '2023-12-15', 'MARK', 'LEE', 'Pending', ''),
('APP41', 'Vaccine', '2023-12-21', 'Rod', 'Dilag', 'Approved', '1701912133.png');

-- --------------------------------------------------------

--
-- Table structure for table `medicinetbl`
--

CREATE TABLE `medicinetbl` (
  `MedicineID` varchar(11) NOT NULL,
  `SKU` varchar(255) NOT NULL,
  `MedicineName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `QRCode` varchar(255) NOT NULL,
  `ExpiryDate` date NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicinetbl`
--

INSERT INTO `medicinetbl` (`MedicineID`, `SKU`, `MedicineName`, `Description`, `Category`, `QRCode`, `ExpiryDate`, `Quantity`) VALUES
('MED01', '17871857', 'HYDROXYUREA', 'Used to treat various conditions, including cancer and sickle cell anemia.', 'Antibiotic', '1701755499.png', '2025-01-25', 35),
('MED02', '44074705', 'IRBESARTAN', 'Used to treat various conditions, including high blood pressure (hypertension), diabetic nephropathy, and congestive heart failure.', 'Angiotensin Receptor Blocker', '1701755770.png', '2025-04-15', 23),
('MED03', '36269920', 'TOLVAPTAN', ' Used for short term treatment of severe hyponatremia.', 'Diuretic', '1701756289.png', '2025-06-27', 37),
('MED05', '123515', 'VITAMIN B COMPLEX', 'Used to treat various conditions, including cancer and sickle cell anemia.', 'Angiotensin Receptor Blocker', '1701782515.png', '2023-12-14', 48),
('MED06', '17268139', 'CETIRIZINE', 'Used in the treatment of allergic rhinitis and urticaria.', 'Antihistamines', '1701838511.png', '2025-03-19', 17),
('MED07', '98046617', 'BIPERIDEN', 'Used alone or together with other medicines to treat Parkinsons disease.', 'Angiotensin Receptor Blocker', '1701838734.png', '2023-05-24', 63),
('MED08', '87693329', 'ZEMPLAR', 'used for the prevention and treatment of secondary hyperparathyroidism associated with chronic kidney failure.', 'Vitamins', '1701839129.png', '2025-08-05', 55),
('MED09', '37344093', 'TIKI-TIKI', 'a trusted childrens multivitamins that contain Vitamins A, B complex, C, D, E, and Lysine.', 'Vitamins', '1701839739.png', '2025-09-16', 44),
('MED10', '20219228', 'REVESTA', 'Used for dietary management of patients with unique nutritional needs requiring increased folate levels.', 'Vitamins', '1701839915.png', '2025-03-25', 60),
('MED11', '38363144', 'PENECILLINS', 'Used to manage and treat a wide range of infections.', 'Antibiotic', '1701840144.png', '2025-06-24', 39),
('MED12', '49163355', 'FLUOROQUINOLONES', 'Class of antibiotics approved to treat or prevent certain bacterial infections.', 'Antibiotic', '1701840290.png', '2025-01-18', 63),
('MED13', '24373753', 'CEPHALOSPORINS', 'Used to manage a wide range of infections from gram-positive and gram-negative bacteria.', 'Antibiotic', '1701840418.png', '2025-07-22', 68),
('MED14', '73555577', 'LOSARTAN', 'Works by blocking a substance in the body that causes blood vessels to tighten.', 'Angiotensin Receptor Blocker', '1701840566.png', '2025-10-27', 59),
('MED15', '19553714', 'PARACETAMOL ', 'Used to ease pain and lower a high temperature about 30 minutes after a dose is taken.', 'Antibiotic', '1701840674.png', '2025-05-22', 39),
('MED16', '20834128', 'AZILSARTAN', 'used in the therapy of hypertension.', 'Angiotensin Receptor Blocker', '1701840805.png', '2025-10-26', 37),
('MED17', '23631554', 'SULFONAMIDE', ' Used to treat urinary tract infections.', 'Antbiotic', '1701840983.png', '2025-10-26', 61),
('MED18', '66550882', 'AUGMENTIN', 'Antibiotic used to treat many different infections caused by bacteria, such as sinusitis, pneumonia, ear infections, bronchitis, urinary tract infections, and infections of the skin.', 'Antbiotic', '1701841139.png', '2025-06-28', 54),
('MED19', '47035290', 'CIPROFLOXACIN', 'Ciprofloxacin oral liquid and tablets are also used to treat anthrax infection after inhalational exposure. ', 'Antbiotic', '1701841265.png', '2025-11-17', 45),
('MED20', '14299132', 'LIMBREL', 'Medical food product made up of substances from plant sources called flavonoids and flavans used to manage osteoarthritis.', 'Vitamins', '1701841349.png', '2025-11-30', 85),
('MED21', '24369870', 'ZOLATE', 'orally-administered (capsule) prescription folate product specifically formulated for the dietary', 'Vitamins', '1701841472.png', '2025-10-12', 45),
('MED22', '14413867', 'DELTA D3', 'used to treat vitamin D deficiency. It is also used with calcium to maintain bone strength.', 'Vitamins', '1701841582.png', '2025-02-26', 73),
('MED23', '37503791', 'MACROLIDES', 'used to manage and treat various bacterial infections.', '', '1701841654.png', '2025-07-28', 35),
('MED24', '47892486', 'CEPHALEXIN', 'Antibiotic that can treat a number of bacterial infections.', 'Antbiotic', '1701841765.png', '2025-12-20', 58),
('MED25', '67260695', 'CALCIJEX', 'Vitamin D3 used to treat or prevent low calcium levels.', 'Vitamins', '1701841872.png', '2025-12-23', 57),
('MED26', '01233435', 'Sample', 'SAMPLE', 'Vitamins', '1702000561.png', '2025-02-28', 37);

-- --------------------------------------------------------

--
-- Table structure for table `recordtbl`
--

CREATE TABLE `recordtbl` (
  `RecordNo` varchar(11) NOT NULL,
  `Date` date NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `BloodPressure` varchar(255) NOT NULL,
  `Temperature` varchar(255) NOT NULL,
  `Recommendation` varchar(255) NOT NULL,
  `WorkerFirstName` varchar(255) NOT NULL,
  `WorkerLastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recordtbl`
--

INSERT INTO `recordtbl` (`RecordNo`, `Date`, `FirstName`, `LastName`, `Purpose`, `BloodPressure`, `Temperature`, `Recommendation`, `WorkerFirstName`, `WorkerLastName`) VALUES
('REC1', '2023-12-08', 'Rod', 'Dilag', 'Consultation', '120/80', '35', 'High Blood', 'sgsgsd', 'dgsgddsg'),
('REC2', '2023-12-11', 'WENDY', 'SHON', 'Consultation', '110/90', '36.2', 'Normal BP - maintain exercise', 'TIANA ', 'SUAREZ'),
('REC3', '2023-12-04', 'POOMPAT', 'LAMSANG', 'CONSULTATION', '120/92', '35.8', 'Diet', 'LOIS', 'FOSTER'),
('REC4', '2023-12-15', 'JOHN NELDINE', 'ABRAHAN', 'Consultation', '130/100', '37', 'High Blood - avoid oily foods', 'BETTY', 'CASE');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `UserID` varchar(11) NOT NULL,
  `Profile` varchar(255) NOT NULL,
  `UserType` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Sex` varchar(255) NOT NULL,
  `Birthday` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`UserID`, `Profile`, `UserType`, `FirstName`, `MiddleName`, `LastName`, `Sex`, `Birthday`, `Address`, `ContactNumber`, `Username`, `Password`) VALUES
('1', '', 'Admin', 'Rod Vincent', 'Frias', 'Dilag', 'Male', '2003-08-29', 'Bauan', '09387441444', 'admin', 'admin123'),
('USER01', '', 'Patient', 'WENDY', '', 'SHON', 'Female', '1994-02-21', 'Villa Teresa Subd.', '9237237281', 'SAMBAT_00001', 'Shon.wen677'),
('USER02', '', 'Patient', 'KATIE YERI', 'KIM', 'DIMAGIBA', 'Female', '1994-03-05', 'Camella Homes', '9065335686', 'SAMBAT_00002', 'Dimagiba.kt755'),
('USER03', '', 'Patient', 'JOOHYUN', '', 'BAE', 'Female', '1991-03-29', 'Cristina Homes', '9047362336', 'SAMBAT_00003', 'Bae.jh0901'),
('USER04', '', 'Patient', 'JOHN NELDINE', 'MAGNAYE', 'ABRAHAN', 'Male', '2002-12-25', 'Villa Teresa Subd.', '9062764530', 'SAMBAT_00004', 'Abrahan.jn1225'),
('USER05', '', 'Patient', 'XYRUZ YUAN', 'ZHONG', 'YI', 'Male', '2002-12-04', 'Perez Compound', '9074569387', 'SAMBAT_00005', 'yi.xy7644'),
('USER06', '', 'Patient', 'MARK', '', 'LEE', 'Male', '1999-08-02', 'Camella Homes', '9055673829', 'SAMBAT_00006', 'Lee.mk8778'),
('USER07', '', 'Patient', 'KAO', '', 'NOPAKKAO', 'Male', '1994-09-09', 'Camella Homes', '9055673829', 'SAMBAT_00006', 'Noppakao.kao99'),
('USER08', '', 'Patient', 'POOMPAT', 'IAM', 'LAMSANG', 'Male', '1994-12-04', 'Camella Homes', '9037494376', 'SAMBAT_00007', 'Lamsang.pi2497'),
('USER09', '', 'Patient', 'JOY', 'LIGAYA', 'PARK', 'Female', '1996-09-03', 'Sambat', '9073963527', 'SAMBAT_00009', 'Park.jl6478'),
('USER10', '', 'Patient', 'SAKURA', '', 'MIYAWAKI', 'Female', '1998-03-19', 'Cristina Homes', '9036852377', 'SAMBAT_00010', 'Miyawaki.sara467'),
('USER11', '', 'Patient', 'PRINCESS ZHANDIE', 'MAGNAYE', 'CEPILLO', 'Female', '2012-02-18', 'Villa Teresa Subd.', '9086576264', 'SAMBAT_00011', 'Cepillo.pz6488'),
('USER12', '', 'Patient', 'CERILLA', 'MACARANDANG', 'MAGNAYE', 'Female', '1930-08-28', 'Villa Teresa Subd.', '9065284648', 'SAMBAT_00012', 'Magnaye.cm367'),
('USER13', '', 'Patient', 'KEN ', '', 'LAZARO', '', '2000-08-28', 'Sambat', 'SAMBAT_00013', 'SAMBAT_00013', 'Lazaro.ken783'),
('USER14', '', 'Patient', 'RIKA', 'SAMS', 'YUKIRO', 'Female', '1999-04-17', 'Villa Teresa Subd.', '9047388368', 'SAMBAT_00014', 'Yukiro.rs948'),
('USER15', '', 'Patient', 'VAN', 'LANDS', 'KITARO', 'Female', '1996-03-25', 'Perez Compound', '9056545443', 'SAMBAT_00015', 'Kitaro.vl748'),
('USER16', '', 'Patient', 'JANN', 'KIRO', 'KALRO', '', '2000-04-20', 'Camella Homes', '9057099488', 'SAMBAT_00016', 'Kalro.jk483'),
('USER17', '', 'Patient', 'Jude ', 'LANN', 'FOLEY', 'Female', '1998-05-09', 'Villa Teresa Subd.', '9046348756', 'SAMBAT_00017', 'Foley.jl584'),
('USER18', '', 'Patient', 'TOBIAS ', 'KYU', 'FAULKNER', 'Male', '2000-07-23', 'Sambat', '9046576843', 'SAMBAT_00018', 'Faulkner.tk584'),
('USER19', '', 'Patient', 'LIAM ', 'CIPA', 'TAPIA', 'Male', '1996-05-17', 'Perez Compound', '9054368765', 'SAMBAT_00019', 'Tapia.lc467'),
('USER20', '', 'Patient', 'ADIL ', 'BYAN', 'HORNE', 'Male', '1997-06-12', 'Perez Compound', '9046383274', 'SAMBAT_00020', 'Horne.ab578'),
('USER21', '', 'Patient', 'ESMEE ', 'JANNS', 'WATERS', 'Male', '2000-05-10', 'Villa Teresa Subd.', '9046834764', 'SAMBAT_00021', 'Walters.ej8457'),
('USER22', '', 'Patient', 'CHANELLE ', 'SONS', 'SAMPSON', 'Female', '1958-10-04', 'Sambat', '9081101273', 'SAMBAT_00022', 'Sampson.cs478'),
('USER23', '', 'Patient', 'JORDANNE ', 'JOSH', 'JORDAN', 'Female', '1997-07-05', 'Sambat', '9046378458', 'SAMBAT_00023', 'Jordan.jj4787'),
('USER24', '', 'Patient', 'WESLEY ', 'BOSH', 'CAMACHO', 'Female', '2000-01-22', 'Perez Compound', '9047328657', 'SAMBAT_00024', 'Camacho.wb569'),
('USER25', '', 'Patient', 'FARIS ', 'HANNS', 'ROBERTSON', 'Female', '1959-04-08', 'Villa Teresa Subd.', '9046575656', 'SAMBAT_00025', 'Robertson.fh473'),
('USER26', '', 'Patient', 'LUISA ', 'HANNI', 'MORSE', 'Female', '1990-09-16', 'Camella Homes', '9075468745', 'SAMBAT_00026', 'Morse.lh7548'),
('USER27', '', 'Patient', 'IMRAN ', 'VANNS', 'CUNNINGHAM', 'Male', '1992-12-11', 'Camella Homes', '9057346584', 'SAMBAT_00027', 'Canningham.iv4738'),
('USER28', '', 'Patient', 'LILY ', 'FANN', 'SOLOMON', 'Female', '1987-08-16', 'Sambat', '9058675866', 'SAMBAT_00028', 'Solomon.lf5784'),
('USER29', '', 'Patient', 'JUAN ', 'LOKI', 'ELLIOTT', 'Male', '1966-11-18', 'Villa Teresa Subd.', '9068743845', 'SAMBAT_00029', 'Elliott.jl4767'),
('USER30', '', 'Patient', 'FARRAH ', 'YAKK', 'KNAPP', 'Female', '1968-05-04', 'Villa Teresa Subd.', '9058764737', 'SAMBAT_00030', 'Knapp.fy5748'),
('USER31', '', 'Patient', 'FAIZA ', 'LARSON', 'DUKE', 'Male', '1972-03-24', 'Sambat', '9068756485', 'SAMBAT_00031', 'Duke.fl4786'),
('USER32', '', 'Patient', 'AUSTIN ', 'LONS', 'FLEMING', 'Male', '1966-12-05', 'Sambat', '9096875673', 'SAMBAT_00032', 'Fleming.al4757'),
('USER33', '', 'Patient', 'ASHTON ', 'GANNS', 'ACOSTA', 'Male', '1958-06-26', 'Villa Teresa Subd.', '9095874656', 'SAMBAT_00033', 'Acosta.ag5748'),
('USER34', '', 'Patient', 'EOIN ', 'PORH', 'MANN', 'Male', '1994-05-13', 'Perez Compound', '9068575689', 'SAMBAT_00034', 'Mann.ep8394'),
('USER35', '', 'Patient', 'MAXIMUS ', 'KERU', 'DUFFY', '', '1960-08-12', 'Perez Compound', '9086754569', 'SAMBAT_00035', 'Duffy.mk3456'),
('USER36', '', 'Patient', 'ERICA ', 'MIKEE', 'BARBER', 'Female', '1956-10-13', 'Perez Compound', '9055867789', 'SAMBAT_00036', 'Barber.em5694'),
('USER37', '', 'Patient', 'JADE ', 'PONSA', 'CHAPMAN', 'Female', '1997-12-02', 'Villa Teresa Subd.', '9087564865', 'SAMBAT_00037', 'Chapman.jp6839'),
('USER38', '', 'Patient', 'ROWAN ', 'YANDI', 'CRUZ', 'Male', '1979-09-23', 'Villa Teresa Subd.', '9084576456', 'SAMBAT_00038', 'Cruz.ry6935'),
('USER39', '', 'Patient', 'ELINOR', 'LIGAW', 'REILLY', 'Male', '1969-04-10', 'Sambat', '9058457467', 'SAMBAT_00039', 'Reilly.el4785'),
('USER40', '', 'Patient', 'DAVINA', 'CANT', 'HOLMAN', 'Female', '1990-08-30', 'Camella Homes', '9058465757', 'SAMBAT_00040', 'Holman.dc4786'),
('USER41', '', 'Worker', 'TIANA ', 'LONSE', 'SUAREZ', 'Female', '1963-04-28', 'Camella Homes', '9096587647', 'BHW_00001', 'Suarez.tl9536'),
('USER42', '', 'Worker', 'LOIS', 'HART', 'FOSTER', 'Female', '1971-08-18', 'Camella Homes', '9095876478', 'BHW_00002', 'Foster.lh8565'),
('USER43', '', 'Worker', 'LEYTON', 'XANTI', 'STRONG', 'Male', '1958-02-06', 'Sambat', '9095874675', 'BHW_00003', 'Strong.lx9457'),
('USER44', '', 'Worker', 'POLLY', 'PEAMO', 'HATFIELD', 'Male', '1968-06-17', 'Sambat', '9045754565', 'BHW_00004', 'Hatfield.pp9657'),
('USER45', '', 'Worker', 'CRYSTAL', 'TINGIN', 'SWANSON', 'Female', '1979-02-09', 'Sambat', '9057384576', 'BHW_00005', 'Swanson.ct865'),
('USER46', '', 'Worker', 'IVAN', 'XZIO', 'FERGUSON', 'Male', '1989-02-16', 'Perez Compound', '9094875569', 'BHW_00006', 'Ferguson.ix6457'),
('USER47', '', 'Worker', 'ELA', 'CYRO', 'SANDOVAL', 'Female', '1970-07-07', 'Villa Teresa Subd.', '9058465757', 'BHW_00007', 'Sandoval.ec7789'),
('USER48', '', 'Worker', 'SHAUNA', 'DENDRO', 'FARMER', 'Female', '1973-12-05', 'Camella Homes', '9048574657', 'BHW_00008', 'Farmer.sd3989'),
('USER49', '', 'Worker', 'GLORIA', '', 'BERNARDO', 'Female', '1976-04-18', 'Perez Compound', '9058576845', 'BHW_00009', 'Reid.gb9678'),
('USER50', '', 'Worker', 'BETTY', 'PYRO', 'CASE', 'Female', '1998-02-04', 'Villa Teresa Subd.', '9095845675', 'BHW_00010', 'Case.bp5684');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmenttbl`
--
ALTER TABLE `appointmenttbl`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `medicinetbl`
--
ALTER TABLE `medicinetbl`
  ADD PRIMARY KEY (`MedicineID`);

--
-- Indexes for table `recordtbl`
--
ALTER TABLE `recordtbl`
  ADD PRIMARY KEY (`RecordNo`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
