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
-- Name: land_average_geometric; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE land_average_geometric (
    id integer NOT NULL,
    text_slope double precision,
    text_thick double precision,
    text_ripe double precision,
    slope_thick double precision,
    slope_ripe double precision,
    thick_ripe double precision,
    bobot_text double precision,
    bobot_slope double precision,
    bobot_thick double precision,
    bobot_ripe double precision,
    cr double precision,
    date timestamp without time zone,
    sum_land_datas integer,
    note character varying
);


ALTER TABLE public.land_average_geometric OWNER TO postgres;

--
-- Name: land_average_geometric_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE land_average_geometric_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.land_average_geometric_id_seq OWNER TO postgres;

--
-- Name: land_average_geometric_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE land_average_geometric_id_seq OWNED BY land_average_geometric.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY land_average_geometric ALTER COLUMN id SET DEFAULT nextval('land_average_geometric_id_seq'::regclass);


--
-- Name: land_average_geometric_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY land_average_geometric
    ADD CONSTRAINT land_average_geometric_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

