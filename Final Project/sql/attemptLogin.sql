/* Select customers where the username and password match those passed as parameters */
SELECT *
FROM roommates
WHERE
	username = :username AND
	password = :password
	