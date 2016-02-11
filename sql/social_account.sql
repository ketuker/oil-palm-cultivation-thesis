CREATE TABLE social_account (
    id integer NOT NULL,
    user_id integer,
    provider character varying(255) NOT NULL,
    client_id character varying(255) NOT NULL,
    data text,
    code character varying(32),
    created_at integer,
    email character varying(255),
    username character varying(255)
);


CREATE SEQUENCE account_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE account_id_seq OWNED BY social_account.id;


ALTER TABLE ONLY social_account ALTER COLUMN id SET DEFAULT nextval('account_id_seq'::regclass);


ALTER TABLE ONLY social_account
    ADD CONSTRAINT account_pkey PRIMARY KEY (id);


CREATE UNIQUE INDEX account_unique ON social_account USING btree (provider, client_id);


CREATE UNIQUE INDEX account_unique_code ON social_account USING btree (code);


ALTER TABLE ONLY social_account
    ADD CONSTRAINT fk_user_account FOREIGN KEY (user_id) REFERENCES "user"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

