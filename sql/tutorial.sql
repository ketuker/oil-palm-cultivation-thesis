CREATE TABLE tutorial (
    id integer NOT NULL,
    id_category integer NOT NULL,
    title character varying NOT NULL,
    description character varying NOT NULL,
    image character varying,
    date timestamp without time zone DEFAULT now()
);

CREATE SEQUENCE tutorial_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE tutorial_id_seq OWNED BY tutorial.id;


ALTER TABLE ONLY tutorial ALTER COLUMN id SET DEFAULT nextval('tutorial_id_seq'::regclass);


ALTER TABLE ONLY tutorial
    ADD CONSTRAINT tutorial_pkey PRIMARY KEY (id);


ALTER TABLE ONLY tutorial
    ADD CONSTRAINT tutorial_id_category_fkey FOREIGN KEY (id_category) REFERENCES tutorial_category(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

