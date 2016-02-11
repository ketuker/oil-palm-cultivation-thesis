
CREATE TABLE landpeat_average_geometry (
    id integer NOT NULL,
    slope_thick double precision,
    slope_ripe double precision,
    thick_ripe double precision,
    bobot_slope double precision,
    bobot_thick double precision,
    bobot_ripe double precision,
    cr double precision,
    date timestamp without time zone DEFAULT now(),
    sum_landpeat_datas integer,
    note character varying
);


CREATE SEQUENCE landpeat_average_geometry_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE landpeat_average_geometry_id_seq OWNED BY landpeat_average_geometry.id;



ALTER TABLE ONLY landpeat_average_geometry ALTER COLUMN id SET DEFAULT nextval('landpeat_average_geometry_id_seq'::regclass);



ALTER TABLE ONLY landpeat_average_geometry
    ADD CONSTRAINT landpeat_average_geometry_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

