--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: factors_avarage_geometric; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE factors_avarage_geometric (
    id integer NOT NULL,
    climate_land double precision,
    climate_accessibility double precision,
    land_accessibility double precision,
    bobot_climate double precision,
    bobot_land double precision,
    bobot_accessibility double precision,
    cr double precision,
    date timestamp without time zone,
    sum_factors_datas integer,
    note character varying
);


ALTER TABLE public.factors_avarage_geometric OWNER TO postgres;

--
-- Name: factors_avarage_geometric_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE factors_avarage_geometric_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.factors_avarage_geometric_id_seq OWNER TO postgres;

--
-- Name: factors_avarage_geometric_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE factors_avarage_geometric_id_seq OWNED BY factors_avarage_geometric.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY factors_avarage_geometric ALTER COLUMN id SET DEFAULT nextval('factors_avarage_geometric_id_seq'::regclass);


--
-- Name: factors_avarage_geometric_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY factors_avarage_geometric
    ADD CONSTRAINT factors_avarage_geometric_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

