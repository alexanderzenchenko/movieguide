<?php


namespace Drupal\movieguide\Form;


use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class MovieGuideApiSettings extends ConfigFormBase
{

    const SETTINGS_NAME = 'movieguide.settings';

    /**
     * @inheritDoc
     */
    protected function getEditableConfigNames()
    {
        return [self::SETTINGS_NAME];
    }

    /**
     * @inheritDoc
     */
    public function getFormId()
    {
        return 'movieguide_admin_api_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config(self::SETTINGS_NAME);
        $form['url'] = [
          '#type' => 'textfield',
          '#title' => $this->t('IMDB url'),
          '#default_value' => $config->get('url'),
        ];
        $form['api_key'] = [
          '#type' => 'textfield',
          '#title' => $this->t('IMDB API key'),
          '#default_value' => $config->get('api_key'),
        ];
        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->config(self::SETTINGS_NAME)
        ->set('url', $form_state->getValue('url'))
        ->save();

        $this->config(self::SETTINGS_NAME)
          ->set('api_key', $form_state->getValue('api_key'))
          ->save();
        parent::submitForm($form, $form_state);
    }

}
