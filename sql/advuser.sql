--
-- Name: advusr; Type: TABLE; Schema: public; Owner: ketuker; Tablespace: 
--

CREATE TABLE advusr (
    id integer NOT NULL,
    skenario character varying NOT NULL,
    ch_temp double precision NOT NULL,
    ch_dm double precision NOT NULL,
    temp_dm double precision NOT NULL,
    bobot_ch double precision NOT NULL,
    bobot_temp double precision NOT NULL,
    bobot_dm double precision NOT NULL,
    cr_climate double precision NOT NULL,
    validation_climate boolean NOT NULL,
    slope_text double precision NOT NULL,
    slope_elev double precision NOT NULL,
    text_elev double precision NOT NULL,
    bobot_slopenp double precision NOT NULL,
    bobot_text double precision NOT NULL,
    bobot_elev double precision NOT NULL,
    cr_landnpeat double precision NOT NULL,
    validation_landnpeat boolean NOT NULL,
    slope_thick double precision NOT NULL,
    slope_ripe double precision NOT NULL,
    thick_ripe double precision NOT NULL,
    bobot_slopep double precision NOT NULL,
    bobot_thick double precision NOT NULL,
    bobot_ripe double precision NOT NULL,
    cr_landpeat double precision NOT NULL,
    validation_landpeat boolean NOT NULL,
    road_mills double precision NOT NULL,
    road_town double precision NOT NULL,
    mills_town double precision NOT NULL,
    bobot_road double precision NOT NULL,
    bobot_mills double precision NOT NULL,
    bobot_town double precision NOT NULL,
    cr_accessibility double precision NOT NULL,
    validation_accessibility boolean NOT NULL,
    climate_land double precision NOT NULL,
    climate_accessibility double precision NOT NULL,
    land_accessibility double precision NOT NULL,
    bobot_climate double precision NOT NULL,
    bobot_land double precision NOT NULL,
    bobot_accessibility double precision NOT NULL,
    cr_factors double precision NOT NULL,
    validation_factors boolean NOT NULL,
    id_user integer,
    dates timestamp without time zone DEFAULT now() NOT NULL
);



--
-- Name: advusr_id_seq; Type: SEQUENCE; Schema: public; Owner: ketuker
--

CREATE SEQUENCE advusr_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;



--
-- Name: advusr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ketuker
--

ALTER SEQUENCE advusr_id_seq OWNED BY advusr.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ketuker
--

ALTER TABLE ONLY advusr ALTER COLUMN id SET DEFAULT nextval('advusr_id_seq'::regclass);


--
-- Data for Name: advusr; Type: TABLE DATA; Schema: public; Owner: ketuker
--



--
-- Name: advusr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ketuker
--

SELECT pg_catalog.setval('advusr_id_seq', 1, false);


--
-- Name: advusr_pkey; Type: CONSTRAINT; Schema: public; Owner: ketuker; Tablespace: 
--

ALTER TABLE ONLY advusr
    ADD CONSTRAINT advusr_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

