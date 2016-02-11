

CREATE TABLE factors_avarage_geometric (
    id integer NOT NULL,
    climate_land double precision,
    climate_accessibility double precision,
    land_accessibility double precision,
    bobot_climate double precision,
    bobot_land double precision,
    bobot_accessibility double precision,
    cr double precision,
    date timestamp without time zone DEFAULT now(),
    sum_factors_datas integer,
    note character varying
);



CREATE SEQUENCE factors_avarage_geometric_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;



ALTER SEQUENCE factors_avarage_geometric_id_seq OWNED BY factors_avarage_geometric.id;



ALTER TABLE ONLY factors_avarage_geometric ALTER COLUMN id SET DEFAULT nextval('factors_avarage_geometric_id_seq'::regclass);



ALTER TABLE ONLY factors_avarage_geometric
    ADD CONSTRAINT factors_avarage_geometric_pkey PRIMARY KEY (id);



