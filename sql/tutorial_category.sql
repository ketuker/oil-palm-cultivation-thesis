CREATE TABLE tutorial_category (
    id integer NOT NULL,
    category character varying NOT NULL
);


CREATE SEQUENCE tutorial_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE tutorial_category_id_seq OWNED BY tutorial_category.id;


ALTER TABLE ONLY tutorial_category ALTER COLUMN id SET DEFAULT nextval('tutorial_category_id_seq'::regclass);


ALTER TABLE ONLY tutorial_category
    ADD CONSTRAINT tutorial_category_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

