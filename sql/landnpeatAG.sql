
CREATE TABLE landnpeat_average_geometry (
    id integer NOT NULL,
    slope_text double precision,
    slope_elev double precision,
    text_elev double precision,
    bobot_slope double precision,
    bobot_text double precision,
    bobot_elev double precision,
    cr double precision,
    date timestamp without time zone DEFAULT now(),
    sum_landnpeat_datas integer,
    note character varying
);



CREATE SEQUENCE landnpeat_average_geometry_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE landnpeat_average_geometry_id_seq OWNED BY landnpeat_average_geometry.id;


ALTER TABLE ONLY landnpeat_average_geometry ALTER COLUMN id SET DEFAULT nextval('landnpeat_average_geometry_id_seq'::regclass);



ALTER TABLE ONLY landnpeat_average_geometry
    ADD CONSTRAINT landnpeat_average_geometry_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

