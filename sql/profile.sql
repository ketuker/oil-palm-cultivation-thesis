CREATE TABLE profile (
    user_id integer NOT NULL,
    name character varying(255),
    public_email character varying(255),
    gravatar_email character varying(255),
    gravatar_id character varying(32),
    location character varying(255),
    website character varying(255),
    bio text
);


ALTER TABLE ONLY profile
    ADD CONSTRAINT profile_pkey PRIMARY KEY (user_id);



ALTER TABLE ONLY profile
    ADD CONSTRAINT fk_user_profile FOREIGN KEY (user_id) REFERENCES "user"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

