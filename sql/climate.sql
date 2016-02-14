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



CREATE TABLE climate (
    id integer NOT NULL,
    ch_temp double precision NOT NULL,
    ch_dm double precision NOT NULL,
    temp_dm double precision NOT NULL,
    bobot_ch double precision NOT NULL,
    boobt_temp double precision NOT NULL,
    bobot_dm double precision NOT NULL,
    cr double precision NOT NULL,
    validation boolean DEFAULT true NOT NULL,
    id_user integer,
    date timestamp without time zone DEFAULT now() NOT NULL
);



COMMENT ON COLUMN climate.validation IS 'TRUE = valid | FALSE = not valid';



CREATE SEQUENCE climate_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;



ALTER SEQUENCE climate_id_seq OWNED BY climate.id;


ALTER TABLE ONLY climate ALTER COLUMN id SET DEFAULT nextval('climate_id_seq'::regclass);



ALTER TABLE ONLY climate
    ADD CONSTRAINT climate_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

