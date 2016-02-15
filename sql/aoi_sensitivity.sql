

CREATE TABLE aoi_sensitivity (
    id integer NOT NULL,
    title character varying,
    description character varying,
    dates timestamp with time zone DEFAULT now(),
    id_user integer,
    data text,
    st_area double precision,
    data_rain text,
    data_temp text,
    data_dm text,
    data_slope text,
    data_text text,
    data_elev text,
    data_thick text,
    data_ripe text,
    data_road text,
    data_mills text,
    data_town text,
    id_scenario integer,
    geom geometry(Polygon,4326)
);






CREATE SEQUENCE aoi_sensitivity_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;




ALTER SEQUENCE aoi_sensitivity_id_seq OWNED BY aoi_sensitivity.id;




ALTER TABLE ONLY aoi_sensitivity ALTER COLUMN id SET DEFAULT nextval('aoi_sensitivity_id_seq'::regclass);


ALTER TABLE ONLY aoi_sensitivity
    ADD CONSTRAINT aoi_sensitivity_pkey PRIMARY KEY (id);



