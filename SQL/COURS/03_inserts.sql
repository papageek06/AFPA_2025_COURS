-- Insert data in table

INSERT INTO employees(id_employee, first_name, name, sexe, service, starting_date, salary) VALUES
(1, 'Jean-pierre', 'Laborde', 'm', 'management', '2000-01-01', 4000);

-- Other syntax

INSERT INTO employees VALUES
(2, 'Clement', 'Gallet', 'm', 'production', '2005-03-01', 3000);

-- Insert multiple data

INSERT INTO employees VALUES
(3, 'Thomas', 'Winter', 'm', 'sales', '2011-05-03', 3550),
(4, 'Chloe', 'Dubar', 'f', 'production', '2011-09-05', 1900),
(5, 'Elodie', 'Fellier', 'f', 'administration', '2011-11-22', 1600),
(6, 'Fabrice', 'Grand', 'm', 'accounts', '2011-12-30', 2900),
(7, 'Melanie', 'Collier', 'f', 'sales', '2012-01-08', 3100),
(8, 'Laura', 'Blanchet', 'f', 'management', '2012-05-09', 4500),
(9, 'Guillaume', 'Miller', 'm', 'sales', '2012-07-02', 1900),
(10, 'Celine', 'Perrin', 'f', 'sales', '2012-09-10', 2700),
(11, 'Julien', 'Cottet', 'm', 'administration', '2013-01-05', 1390),
(12, 'Mathieu', 'Vignal', 'm', 'IT', '2013-04-03', 2500),
(13, 'Thierry', 'Desprez', 'm', 'administration', '2013-07-17', 1500),
(14, 'Amandine', 'Thoyer', 'f', 'communication', '2014-01-23', 2100),
(15, 'Damien', 'Durand', 'm', 'IT', '2014-07-05', 2250),
(16, 'Daniel', 'Chevel', 'm', 'IT', '2015-09-28', 3100),
(17, 'Nathalie', 'Martin', 'f', 'legal', '2016-01-12', 3550),
(18, 'Benoit', 'Lagarde', 'm', 'production', '2016-06-03', 2550),
(19, 'Emilie', 'Sennard', 'f', 'sales', '2017-01-11', 1800),
(20, 'Stephanie', 'Lafaye', 'f', 'assistant', '2017-03-01', 1775);

-- Insert data with Primary Key Auto-Increment

INSERT INTO employees (first_name, name, sexe, service, starting_date, salary) VALUES
('Thomas', 'Dupont', 'm', 'production', '2015-03-01', 3000);