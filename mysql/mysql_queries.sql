1. 
SELECT monthname(charged_datetime) charged_month, year(charged_datetime) charged_year, SUM(amount) revenue
FROM billing
GROUP BY charged_month, charged_year;

2.
SELECT client_id, sum(amount) total_revenue
FROM billing
WHERE client_id= 2; 

3.
SELECT client_id, sum(amount) total_revenue
FROM billing
WHERE client_id= 10;

4.
a
SELECT client_id, count(created_datetime) number_of_websites, month(created_datetime) month_created, year(created_datetime) year_created
FROM sites
WHERE client_id = 1
GROUP BY month_created, year_created
ORDER BY created_datetime;
b
SELECT client_id, count(created_datetime) number_of_websites, month(created_datetime) month_created, year(created_datetime) year_created
FROM sites
WHERE client_id = 20
GROUP BY month_created, year_created
ORDER BY created_datetime;

5.
SELECT sites.domain_name website, DATE_FORMAT(leads.registered_datetime, '%M %d, %Y') date_generated
FROM leads
JOIN sites ON leads.site_id - sites.site_id
WHERE leads.registered_datetime BETWEEN '2011-01-01' AND '2011-02-16'

ORDER BY domain_name;

6.
SELECT CONCAT(clients.first_name, ' ', clients.last_name) client_name, count(leads.site_id) number_of_leads, DATE_FORMAT(leads.registered_datetime, '%M %d, %Y') date_generated
FROM clients
JOIN sites ON clients.client_id = sites.client_id
JOIN leads ON sites.site_id = leads.site_id
WHERE leads.registered_datetime BETWEEN '2011-01-01' AND '2012-01-01'
GROUP BY clients.client_id
ORDER BY clients.client_id;

7.
SELECT CONCAT(clients.first_name, ' ', clients.last_name) client_name, count(leads.site_id) number_of_leads, MONTHNAME(leads.registered_datetime, '%M %d, %Y') date_generated
FROM clients
JOIN sites ON clients.client_id = sites.client_id
JOIN leads ON sites.site_id = leads.site_id
WHERE leads.registered_datetime BETWEEN '2011-01-01' AND '2011-07-01'
GROUP BY generated_date, clients.client_id
ORDER BY registered_datetime, client_id;

8. 
a.
SELECT concat(clients.first_name, ' ', clients.last_name) client_name, sites.domain_name website, count(leads.site_id) number_of_leads, DATE_FORMAT(registered_datetime, '%M %d, %Y') generated_date 
FROM clients 
JOIN sites ON clients.client_id = sites.client_id 
JOIN leads on sites.site_id = leads.site_id 
WHERE registered_datetime BETWEEN '2011-01-01' AND '2012-01-01' 
GROUP BY sites.site_id 
ORDER BY clients.client_id;

b.
SELECT concat(clients.first_name, ' ', clients.last_name) client_name, sites.domain_name website, count(leads.site_id) number_of_leads 
FROM clients 
JOIN sites ON clients.client_id = sites.client_id join leads on sites.site_id = leads.site_id 
GROUP BY sites.site_id
ORDER BY clients.client_id;

9.
SELECT CONCAT(clients.first_name, ' ', clients.last_name) client_name, sum(billing.amount) Total_Revenue, monthname(charged_datetime) month_charge, year(charged_datetime) year_charge 
FROM clients 
JOIN billing ON clients.client_id = billing.client_id 
GROUP BY month(charged_datetime), year(charged_datetime), clients.client_id 
ORDER BY clients.client_id;

10.
SELECT CONCAT(clients.first_name, ' ', clients.last_name) client_name, GROUP_CONCAT(sites.domain_name SEPARATOR ' / ') sites 
FROM clients 
JOIN sites on clients.client_id = sites.client_id 
GROUP BY clients.client_id
ORDER BY clients.client_id;