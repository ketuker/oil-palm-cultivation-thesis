

CREATE TABLE factors (
    id integer NOT NULL,
    climate_land double precision NOT NULL,
    climate_accessibility double precision NOT NULL,
    land_accessibility double precision NOT NULL,
    bobot_climate double precision NOT NULL,
    bobot_land double precision NOT NULL,
    bobot_accessibility double precision NOT NULL,
    cr double precision NOT NULL,
    validation boolean DEFAULT true NOT NULL,
    id_user integer,
    date timestamp with time zone DEFAULT now() NOT NULL
);



CREATE SEQUENCE factors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;



ALTER SEQUENCE factors_id_seq OWNED BY factors.id;



ALTER TABLE ONLY factors ALTER COLUMN id SET DEFAULT nextval('factors_id_seq'::regclass);



ALTER TABLE ONLY factors
    ADD CONSTRAINT factors_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

