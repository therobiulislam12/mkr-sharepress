import { useState, useEffect } from "react";
import {toast} from 'react-toastify';

const FormSettings = () => {
  const [isEnable, setIsEnable] = useState("on");
  const [selectedTemplate, setSelectedTemplate] = useState("template-1");

  const handleEnable = () => {
    setIsEnable((prev) => (prev === "on" ? "" : "on"));
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    let formData = new FormData(e.target);
    formData.append("action", "sspp_save_settings_post");
    formData.append("_ajax_nonce", SSPPData.sspp_save_nonce);

    fetch(SSPPData.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then((res) => {
        return res.json();
      })
      .then((res) => {
        if(res.success){
          toast.success(
            'Updated Successfully!',
            {
              position: "bottom-right",
              autoClose: 1000,
            }
          )
        }
      });
  };

  useEffect(() => {
    fetch(SSPPData.ajax_url + "?action=sspp_show_settings_on_load")
      .then((res) => {
        return res.json();
      })
      .then((res) => {
        if (res.success) {
          setIsEnable(res.data?.is_enable);
          setSelectedTemplate(res.data?.selected_template);
        }
      });
  }, []);

  return (
    <div className="sspp-form-settings">
      <h2>General settings</h2>
      <div className="sspp-form-wrapper">
        <form method="post" onSubmit={handleSubmit}>
          <div className="sspp-input-field">
            <p>Enable / Disable Social Share Press: </p>
            <label
              htmlFor="sspp_enable_disable"
              className="sspp-image-checkbox"
            >
              <input
                type="checkbox"
                id="sspp_enable_disable"
                name="sspp_enable_disable"
                onChange={handleEnable}
                checked={isEnable === "on"}
              />
              <span>Enable</span>
            </label>
          </div>

          <div className="sspp-input-field sspp-template-selection">
            <p>Select a Template:</p>
            <div className="sspp-templates">
              <select name="sspp_select_template" id="sspp_select_template">
                {[1, 2, 3, 4, 5].map((template) => (
                  <option
                    value={`template-${template}`}
                    selected={selectedTemplate === `template-${template}`}
                  >
                    Template {template}
                  </option>
                ))}
              </select>
            </div>
          </div>
          <div className="sspp-submit-button">
            <input
              type="submit"
              value="Save Settings"
              name="sspp-save-settings"
            />
          </div>
        </form>
      </div>
    </div>
  );
};

export default FormSettings;
