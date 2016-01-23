--
-- Name: climate_average_geometric; Type: TABLE; Schema: public; Owner: apank; Tablespace: 
--

CREATE TABLE climate_average_geometric (
    id integer NOT NULL,
    ch_temp double precision,
    ch_dm double precision,
    temp_dm double precision,
    bobot_ch double precision,
    boobt_temp double precision,
    bobot_dm double precision,
    cr double precision,
    date timestamp without time zone DEFAULT now(),
    sum_climate_datas integer,
    note character varying
);


--
-- Name: climate_summary_id_seq; Type: SEQUENCE; Schema: public; Owner: apank
--

CREATE SEQUENCE climate_summary_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: climate_summary_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: apank
--

ALTER SEQUENCE climate_summary_id_seq OWNED BY climate_average_geometric.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: apank
--

ALTER TABLE ONLY climate_average_geometric ALTER COLUMN id SET DEFAULT nextval('climate_summary_id_seq'::regclass);