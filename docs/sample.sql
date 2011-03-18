-- SQLite schema for permission administration
-- usage: sqlite /tmp/user.db < sample.sql

CREATE TABLE auth (
	username VARCHAR(50) NOT NULL, -- username
	password VARCHAR(50) NOT NULL  -- password
);

-- plain password 
--INSERT INTO auth VALUES ('taro','secret'); 
--INSERT INTO auth VALUES ('jiro','secret');

-- md5 hash password: secret
--INSERT INTO auth VALUES ('taro','5ebe2294ecd0e0f08eab7690d2a6ee69'); 
--INSERT INTO auth VALUES ('jiro','5ebe2294ecd0e0f08eab7690d2a6ee69');

-- a1 (md5(username:realm:password)) for http digest authentication
--  realm: sample, password: secret
INSERT INTO auth VALUES ('taro','d0f7c5ba4f2f2ed16f2a714332633ad5'); 
INSERT INTO auth VALUES ('jiro','d41438d297ee671f2249cc0d6c1f3997');
