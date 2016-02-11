CREATE TABLE token (
    user_id integer NOT NULL,
    code character varying(32) NOT NULL,
    created_at integer NOT NULL,
    type smallint NOT NULL
);


CREATE UNIQUE INDEX token_unique ON token USING btree (user_id, code, type);

ALTER TABLE ONLY token
    ADD CONSTRAINT fk_user_token FOREIGN KEY (user_id) REFERENCES "user"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

