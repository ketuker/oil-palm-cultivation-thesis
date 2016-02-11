--
-- Name: landnpeat_average_geometry; Type: TABLE; Schema: public; Owner: ketuker; Tablespace: 
--

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

--
-- Name: landnpeat_average_geometry_id_seq; Type: SEQUENCE; Schema: public; Owner: ketuker
--

CREATE SEQUENCE landnpeat_average_geometry_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: landnpeat_average_geometry_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ketuker
--

ALTER SEQUENCE landnpeat_average_geometry_id_seq OWNED BY landnpeat_average_geometry.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ketuker
--

ALTER TABLE ONLY landnpeat_average_geometry ALTER COLUMN id SET DEFAULT nextval('landnpeat_average_geometry_id_seq'::regclass);


--
-- Data for Name: landnpeat_average_geometry; Type: TABLE DATA; Schema: public; Owner: ketuker
--



--
-- Name: landnpeat_average_geometry_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ketuker
--

SELECT pg_catalog.setval('landnpeat_average_geometry_id_seq', 1, false);


--
-- Name: landnpeat_average_geometry_pkey; Type: CONSTRAINT; Schema: public; Owner: ketuker; Tablespace: 
--

ALTER TABLE ONLY landnpeat_average_geometry
    ADD CONSTRAINT landnpeat_average_geometry_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

